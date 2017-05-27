<?php

namespace Graphs;

use Graphs\GraphMatrix;

/**
* A GraphMatrixDirected Class
* 
* @file GraphMatrixDirected.php
* @author Tlotliso Mafantiri
* 
* @package Graphs
*/
class GraphMatrixDirected extends GraphMatrix
{
	/**
	 * Constructor. Initialize the Graph
	 * 
	 * @param integer $size: the size of the graph
	 */
	function __construct($size)
	{
		parent::__construct($size, true);
	}

	/**
	 * Add an edge
	 * 
	 * @param mixed $vLabel1: label for the first vertex
	 * @param mixed $vLabel2: label for the second vertex
	 * @param mixed $label: a labeled edge joining $v1 and $v2
	 * @return void
	 */
	public function addEdge($vLabel1, $vLabel2, $label)
	{
		// get the vertices
		$v1 = $this->dict->get($vLabel1);
		$v2 = $this->dict->get($vLabel2);

		//update the matrix with new edge
		$e = new Edge($vLabel1, $vLabel2, $label, true);
		$this->data->set($v1->index(), $v2->index(), $e);
	}

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
	public function removeEdge($vLabel1, $vLabel2)
	{
		// get indices
		$row = $this->dict->get($vLabel1)->index();
		$col = $this->dict->get($vLabel2)->index();

		// cache the old value
		$e = $this->data->get($row, $col);

		// update the matrix
		$this->data->set($row, $col, null);

		if ($e == null) {
			return null;
		}

		return $e->label();
	}

	/**
	 * Get an iterator for traversing all edges
	 * 
	 * This returns an Iterator for traversing all
	 * edges with each edge visited exactly once.
	 * 
	 * @return Iterator
	 */
	public function edges()
	{
		$list = new LinkedList();

		for ($row = $this->size - 1; $row  >= 0; $row--) { 
			for ($col = $this->size - 1; $col  >= 0; $col--) { 
				$e = $this->data->get($row, $col);
				if ($e != null) {
					$list->addLast($e);
				}
			}
		}

		return $list->iterator();
	}
}