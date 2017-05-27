<?php

namespace LinkedLists;

/**
 * A class that works with Nodes of a Doubly Linked List
 *
 * @file    DNode.php
 * @author  Tlotliso Mafantiri
 */
class DNode
{
	/**
	 * @var mixed $value: The value stored in the Node
	 */
	protected $value;

	/**
	 * @var Node $next: A reference to the next Node (element)
	 */
	protected $next;
	
	/**
	 * @var Node $prev: A reference to the previous Node (element)
	 */
	protected $prev;

	/**
     * Constructor. Initialize the Node.
     *
     * @param mixed $_value: A value to be stored in the node
     * @param Node $_next: The next element
     * @return void
     */
	function __construct($_value, $_next, $_prev = null)
	{
		$this->value = $_value;
		$this->prev = $_prev;
		if ($this->prev != null) {
			$this->prev->next() = $this;
		}
		$this->next = $_next;
		if ($this->next != null) {
			$this->next->prev() = $this;
		}
	}

	/**
     * Get the previous element
     *
     * @return Node $prev
     */
	public function prev()
	{
		return $this->prev;
	}

	/**
     * Set the previous element
     *
     * @param Node $prev: The previous element
     * @return void
     */
	public function setPrev($prev)
	{
		$this->prev = $prev;
	}
}