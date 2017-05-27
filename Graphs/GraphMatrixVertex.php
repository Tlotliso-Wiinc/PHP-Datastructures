<?php

namespace Graphs;

use Graphs\Vertex;

/**
 * A GraphMatrixVertex Class
 * 
 * @file GraphMatrixVertex.php
 * @author Tlotliso Mafantiri
 * 
 * @package Graphs
 */
class GraphMatrixVertex extends Vertex
{
	/**
	 * @var integer $index: the position of the vertex in an adjacency matrix
	 */ 
	protected $index;

	/**
     * Constructor. Initialize the Vertex
     * 
     * @param mixed $label
     * @param integer $index
     * @return void
     */
	function __construct($label, $index)
	{
		$this->label = $label;
		$this->index = $index;
		$this->visited = false;
	}

	/**
	 * Get the vertex index
	 * 
	 * @return integer
	 */ 
	public function index()
	{
		return $this->index;
	}
}