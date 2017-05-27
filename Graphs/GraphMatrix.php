<?php

namespace Graphs;

use Interfaces\Graph;
use LinearStructures\Matrix;
use Maps\MapArray;
use LinkedLists\LinkedList;
use Graphs\GraphMatrixVertex;

/**
 * A GraphMatrix Class
 * 
 * @file GraphMatrix.php
 * @author Tlotliso Mafantiri
 * 
 * @package Graphs
 */
abstract class GraphMatrix implements Graph
{
	/**
	 * @var integer $size: allocated size for the graph 
	 */
	protected $size;

	/**
	 * @var Matrix $data: the adjacency matrix data
	 */ 
	protected $data;

	/**
	 * @var Map $dict: a dictionary of labels mapped to vertices
	 */
	protected $dict;

	/**
	 * @var List $freeList: a list of available indices in the matrix
	 */
	protected $freeList;

	/**
	 * @var boolean $directed: the directed flag
	 */ 
	protected $directed;s

	/**
	 * Constructor. Initialize the Graph
	 * 
	 * @param integer $size: the size of the graph
	 * @param boolean $directed: the directed flag 
	 */
	function __construct($size, $directed)
	{
		$this->size = $size;
		$this->directed = $directed;
		$this->data = new Matrix($size, $size);

		// an associative array for mapping labels to vertices
		// however the only labels allowed are strings and numbers
		$this->dict = new MapArray();

		$this->freeList = new LinkedList();
		for($r = $size-1; $r >= 0; $r--) {
			$this->freeList->addLast($r);
		}
	}

	/**
	 * Get the number of vertices in a graph
	 * 
	 * @return integer
	 */
	 public function size()
	 {
	 	return $this->dict->size();
	 }

	/**
	 * Add a vertex
	 * 
	 * A vertex with a label is added to the graph, if a 
	 * a vertex with the specified label is already in
	 * the graph, then no action is taken.
	 * 
	 * @param mixed $label
	 * @return void
	 */
	public function add($label)
	{
		if ($this->dict->containsKey($label)) {
			return; // do nothing
		}

		$index = $this->freeList->removeFirst();
		$this->dict->put($label, new GraphMatrixVertex($label, $index));
	}

	/**
	 * Remove a vertex
	 * 
	 * @param mixed $label
	 * @return mixed
	 */
	public function remove($label)
	{
		$vert = $this->dict->remove($label);

		if ($vert == null) {
			return null;
		}

		$index = $vert->index();

		// clear row and column entries
		for ($row = 0; $row < $this->size; $row++) { 
			$this->data->set($row, $index, null);
			$this->data->set($index, $row, null);
		}

		// add node index to the free list
		$this->freeList->addLast($index);

		return $vert->label();
	}

	/**
	 * Add an edge
	 * 
	 * @param mixed $vLabel1: label for the first vertex
	 * @param mixed $vLabel2: label for the second vertex
	 * @param mixed $label: a labeled edge joining $v1 and $v2
	 * @return void
	 */
	abstract public function addEdge($vLabel1, $vLabel2, $label);

	/** 
	 * Remove an edge
	 * 
	 * The edge is removed and its label is
	 * returned.
	 * 
	 * @param mixed $vLabel1: label for the first vertex
	 * @param mixed $vLabel2: label for the second vertex
	 * @return mixed
	 */
	abstract public function removeEdge($vLabel1, $vLabel2);

	/**
	 * Visit a vertex
	 * 
	 * Set visited flag on vertex and return the
	 * previous value.
	 * 
	 * @param mixed $vLabel
	 * @return boolean 
	 */
	public function visit($vLabel)
	{
		$vert = $this->dict->get($vLabel);
		return $vert->visit();
	}

	/**
	 * Visit a vertex
	 * 
	 * Set visited flag on vertex and return the
	 * previous value.
	 * 
	 * @param Edge $edge
	 * @return boolean 
	 */
	public function visitEdge($edge)
	{
		return $edge->visit();
	}

	/**
	 * Check if a vertex has been visited
	 * 
	 * @param mixed $v
	 * @return boolean
	 */
	public function isVisited($vLabel)
	{
		$vert = $this->dict->get($vLabel);
		return $vert->isVisited();
	}

	/**
	 * Check if an edge has been visited
	 * 
	 * @param Edge $edge
	 * @return boolean
	 */
	public function isVisitedEdge($edge)
	{
		return $edge->isVisited();
	}

	/**
	 * Get the vertices iterator
	 * 
	 * This returns an Iterator for traversing all
	 * vertices in the graph.
	 * 
	 * @return Iterator
	 */
	public function iterator()
	{
		return $this->dict->keySet()->iterator();
	}

	/**
	 * Get a vertex's neighbors iterator
	 * 
	 * This returns an Iterator for traversing all
	 * vertices adjacent to a specified vertex.
	 * 
	 * @param mixed $vLabel
	 * @return Iterator
	 */
	public function neighbors($vLabel)
	{
		$vert = $this->dict->get($vLabel);
		$list = new LinkedList();

		if($vert != null) {   // if the vertex label exists
			for ($row = $this->size - 1; $row >= 0; $row--) { 
				$e = $this->data->get($vert->index(), $row);

				if ($e != null) {
					if ($e->here() == $vert->label()) {
						$list->addLast($e->there());	
					} else {
						$list->addLast($e->here());
					}
				}
			}
		}

		return $list->iterator();
	}

	/**
	 * Reset all visited flags to false
	 * 
	 * @return void
	 */
	public function reset()
	{
		$iterator = $this->iterator();

		while ($iterator->hasNext()) {
			$vert = $this->dict->get($iterator->next());
			$vert->reset();
		}
	}

	/**
	 * Get the actual label of the indicated vertex
	 * 
	 * @param mixed $v
	 * @return mixed
	 */
	public function get($v)
	{
		return $v->label();
	}

	/**
	 * Get the actual edge between vertices
	 * 
	 * @param mixed $vLabel1: label for the first vertex
	 * @param mixed $vLabel2: label for the second vertex
	 * @return Edge
	 */
	public function getEdge($vLabel1, $vLabel2)
	{ 
		$elements = $this->edges();

		while ($elements->hasNext()) {
			$edge = $elements->next();

			if ( ($edge->here()->label() == $vLabel1 
				&& $edge->there()->label() == $vLabel2) ||
				($edge->here()->label() == $vLabel2 
				&& $edge->there()->label() == $vLabel1) ) {
				return $edge;	
			}
		}

		return null;
	}

	/**
	 * Get an iterator for traversing all edges
	 * 
	 * This returns an Iterator for traversing all
	 * edges with each edge visited exactly once.
	 * 
	 * @return Iterator
	 */
	abstract public function edges();

	/**
	 * Check if there is a vertex with the specified label
	 * 
	 * @param mixed $vLabel
	 * @return boolean
	 */
	public function contains($vLabel)
	{
		$elements = $this->iterator();

		while ($elements->hasNext()) {
			$label = $elements->next();

			if ($label == $vLabel) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Check if the edge exists in the graph
	 * 
	 * @param mixed $v1: label for the first vertex
	 * @param mixed $v2: label for the second vertex
	 */
	public function containsEdge($v1, $v2)
	{
		return $this->getEdge($v1, $v2) != null;
	}

	/**
	 * Get the degree of a vertex
	 * 
	 * This returns the number of vertices that are
	 * adjacent to the vertex.
	 * 
	 * @param mixed $vLabel
	 * @return integer 
	 */
	public function degree($vLabel)
	{
		$vert = $this->dict->get($vLabel);
		$count = 0;

		for ($row = $this->size - 1; $row >= 0; $row--) { 
			$e = $this->data->get($vert->index(), $row);

			if ($e != null) {
				if ($e->here() == $vert->label()) {
					$count++;	
				} else {
					$count++;
				}
			}
		}

		return $count;
	}

	/**
	 * Get the number of edges in the graph
	 * 
	 * @return integer 
	 */
	public function edgeCount() 
	{
		$elements = $this->edges();
		$count = 0;

		while ($elements->hasNext()) {
			$count++;
		}

		return $count;
	}

	/**
	 * Remove all vertices from the graph
	 * 
	 * @return void 
	 */
	public function clear()
	{
		$this->dict->clear();
		$this->data->clear();
	}

	/**
	 * Check if the graph has vertices
	 * 
	 * @return boolean 
	 */
	public function isEmpty()
	{
		return $this->dict->isEmpty();
	}

	/**
	 * Check if the edges are directed
	 * 
	 * @return boolean
	 */ 
	public function isDirected()
	{
		return $this->directed == true;
	}
}