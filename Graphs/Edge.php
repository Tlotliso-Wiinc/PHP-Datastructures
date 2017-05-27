<?php

namespace Graphs;

/**
 * The Edge class
 * 
 * @file Edge.php
 * @author Tlotliso Mafantiri
 * 
 * @package Graphs
 */
class Edge
{
	/**
	 * @var mixed $label: the edge label
	 */
	protected $label;

	/**
	 * @var boolean $visited: the visited flag
	 */ 
	protected $visited;

	/**
	 * @var boolean $directed: the directed flag 
	 */
	protected $directed;

	/**
	 * @var Vertex $vLabel1: the first vertex 
	 */
	protected $vLabel1;

	/**
	 * @var Vertex $vabel2: the second vertex
	 */ 
	protected $vLabel2;

	/**
     * Constructor. Initialize the Edge
     * 
     * Edge associates $v1 and $v2 labeled with $label
     * and directed if "$directed" is set to true.
     * 
     * @param Vertex $v1
     * @param Vertex $v2
     * @param mixed $label
     * @param boolean $directed
     * @return void
     */
	function __construct($v1, $v2, $label, $directed = false)
	{
		$this->vLabel1 = $v1;
		$this->vLabel2 = $v2;
		$this->label = $label;
		$this->directed = $directed;
		$this->visited = false;
	}

	/**
	 * Get the first node in the edge
	 * 
	 * @return Vertex 
	 */
	public function here()
	{
		return $this->vLabel1;
	}

	/**
	 * Get the second node in the edge
	 * 
	 * @return Vertex 
	 */
	public function there()
	{
		return $this->vLabel2;
	}

	/**
	 * Set the label of this edge
	 * 
	 * @param mixed $label
	 * @return void
	 */
	public function setLabel($label)
	{
		$this->label = $label;
	}

	/**
	 * Get the edge label
	 * 
	 * @return mixed
	 */ 
	public function label()
	{
		return $this->label;
	}

	/**
	 * Mark the edge as visited
	 * 
	 * @return boolean
	 */ 
	public function visit()
	{
		$this->visited = true;
	}

	/**
	 * Check if the edge has been visited
	 * 
	 * This returns true if and only if the edge has
	 * been visited
	 * 
	 * @return boolean 
	 */
	public function isVisited()
	{
		return $this->visited == true;
	}

	/**
	 * Mark the edge as unvisited
	 */
	public function reset()
	{
		$this->visited = false;
	}

	/**
	 * Check if the edge is equal to another
	 * 
	 * This returns true if and only if the edge
	 * labels are equal.
	 * 
	 * @param Object $other
	 * @return boolean
	 */ 
	public function equals($other)
	{

	}
} 