<?php

namespace Interfaces;

/**
 * A Graph Interface
 * 
 * @file Graph.php
 * @author Tlotliso Mafantiri
 * 
 * @package Interfaces
 */
interface Graph
{
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
	public function add($label);

	/**
	 * Add an edge
	 * 
	 * @param mixed $v1: label for the first vertex
	 * @param mixed $v2: label for the second vertex
	 * @param mixed $label: a labeled edge joining $v1 and $v2
	 * @return void
	 */
	public function addEdge($v1, $v2, $label);

	/**
	 * Remove a vertex
	 * 
	 * @param mixed $label
	 * @return mixed
	 */
	public function remove($label);

	/** 
	 * Remove an edge
	 * 
	 * The edge is removed and its label is
	 * returned.
	 * 
	 * @param mixed $v1: label for the first vertex
	 * @param mixed $v2: label for the second vertex
	 * @return mixed
	 */
	public function removeEdge($v1, $v2);

	/**
	 * Get the actual label of the indicated vertex
	 * 
	 * @param mixed $v
	 * @return mixed
	 */
	public function get($v);

	/**
	 * Get the actual edge between vertices
	 * 
	 * @param mixed $v1: label for the first vertex
	 * @param mixed $v2: label for the second vertex
	 * @return Edge
	 */
	public function getEdge($v1, $v2);

	/**
	 * Check if there is a vertex with the specified label
	 * 
	 * @param mixed $label
	 * @return boolean
	 */
	public function contains($label);

	/**
	 * Check if the edge exists in the graph
	 * 
	 * @param mixed $v1: label for the first vertex
	 * @param mixed $v2: label for the second vertex
	 */
	public function containsEdge($v1, $v2);

	/**
	 * Visit a vertex
	 * 
	 * Set visited flag on vertex and return the
	 * previous value.
	 * 
	 * @param mixed $v
	 * @return boolean 
	 */
	public function visit($v);

	/**
	 * Visit a vertex
	 * 
	 * Set visited flag on vertex and return the
	 * previous value.
	 * 
	 * @param Edge $edge
	 * @return boolean 
	 */
	public function visitEdge($edge);

	/**
	 * Check if a vertex has been visited
	 * 
	 * @param mixed $v
	 * @return boolean
	 */
	public function isVisited($v);

	/**
	 * Check if an edge has been visited
	 * 
	 * @param Edge $edge
	 * @return boolean
	 */
	public function isVisitedEdge($edge);

	/**
	 * Reset all visited flags to false
	 * 
	 * @return void
	 */
	public function reset();

	/**
	 * Get the number of vertices in a graph
	 * 
	 * @return integer
	 */
	 public function size(); 

	/**
	 * Get the degree of a vertex
	 * 
	 * This returns the number of vertices that are
	 * adjacent to the vertex.
	 * 
	 * @param mixed $vLabel
	 * @return integer 
	 */
	public function degree($vLabel);

	/**
	 * Get the number of edges in the graph
	 * 
	 * @return integer 
	 */
	public function edgeCount();

	/**
	 * Get the vertices iterator
	 * 
	 * This returns an Iterator for traversing all
	 * vertices in the graph.
	 * 
	 * @return Iterator
	 */
	public function iterator();

	/**
	 * Get a vertex's neighbors iterator
	 * 
	 * This returns an Iterator for traversing all
	 * vertices adjacent to a specified vertex.
	 * 
	 * @return Iterator
	 */
	public function neighbors($v);

	/**
	 * Get an iterator for traversing all edges
	 * 
	 * This returns an Iterator for traversing all
	 * edges with each edge visited exactly once.
	 * 
	 * @return Iterator
	 */
	public function edges();

	/**
	 * Remove all vertices from the graph
	 * 
	 * @return void 
	 */
	public function clear();

	/**
	 * Check if the graph has vertices
	 * 
	 * @return boolean 
	 */
	public function isEmpty();

	/**
	 * Check if the edges are directed
	 * 
	 * @return boolean
	 */ 
	public function isDirected();
}