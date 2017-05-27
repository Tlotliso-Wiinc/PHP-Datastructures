<?php

namespace Graphs;

/**
 * A Vertex Class
 * 
 * @file Vertex.php
 * @author Tlotliso Mafantiri
 * 
 * @package Graphs
 */
class Vertex
{
	/**
	 * @var mixed $label: the vertex label
	 */
	protected $label;

	/**
	 * @var boolean $visited: the visited flag
	 */ 
	protected $visited;
	
	/**
     * Constructor. Initialize the Vertex
     *
     * @return void
     */
	function __construct()
	{
		$this->visited = false;
	}

	/**
	 * Get the vertex label
	 * 
	 * @return mixed
	 */ 
	public function label()
	{
		return $this->label;
	}

	/**
	 * Mark a vertex as visited
	 * 
	 * @return boolean
	 */
	public function visit()
	{
		$old = $this->visited;
		$this->visited = true;

		return $old;
	} 

	/**
	 * Check if a vertex has been visited
	 * 
	 * This returns true if and only if a vertex has
	 * been visited
	 * 
	 * @return boolean 
	 */
	public function isVisited()
	{
		return $this->visited == true;
	}

	/**
	 * Mark a vertex as unvisited
	 * 
	 * @return void
	 */
	public function reset()
	{
		$this->visited = false;
	}

	/**
	 * Check if the vertex is equal to another
	 * 
	 * This returns true if and only if the vertex
	 * labels are equal.
	 * 
	 * @param Object $other
	 * @return boolean
	 */ 
	public function equals($other)
	{
		return $this->label == $other->label;
	}
}