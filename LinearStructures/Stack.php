<?php

namespace LinearStructures;

use LinkedLists\LinkedList;

/**
 * A class that works with Stacks
 *
 * @filesource Stack.php
 * @author  Tlotliso Mafantiri
 */
 class Stack
 {
 	/**
 	 * @var LinkedList $list: A list for holding all elements
 	 */
 	protected $list;

	/**
     * Constructor. Initialize the Stack
     *
     * @return void
     */
	function __construct()
	{
		$this->list = new LinkedList();
	}

	/**
     * Add an item to a stack
     *
     * @param mixed $item
     * @return void
     */
	public function add($item)
	{
		$this->list->addFirst($item);
	}

	/**
     * Add an item to a stack
     *
     * @param mixed $item
     * @return void
     */
	public function push($item)
	{
		$this->add($item);
	}

	/**
     * Remove an item from a stack
     * 
     * The most recently added item is removed
     * and returned
     *
     * @return void
     */
	public function remove()
	{
		return $this->list->removeFirst();
	}

	/**
     * Remove an item from a stack
     * 
     * The most recently added item is removed
     * and returned
     *
     * @return void
     */
	public function pop()
	{
		return $this->remove();
	}

	/**
     * Get the top value (the next to be popped or removed)
     *
     * @return mixed
     */
	public function get()
	{
		return $this->list->getFirst();
	}

	/**
	 * Get the Iterator for traversing the elements
	 * 
	 * @return Iterator
	 */
	public function iterator()
	{
		return $this->data->iterator();
	}

	/**
     * Get the number of elements in the stack
     *
     * @return integer
     */
	public function size()
	{
		return $this->list->size();
	}

	/**
     * Check if the stack is empty
     * 
     * This returns a boolean value of true if
     * and only if the stack is empty
     *
     * @return void
     */
	public function isEmpty()
	{
		return $this->list->isEmpty();
	}

	/**
	 * Remove all elements from the stack
	 * 
	 * @return void
	 */
	public function clear()
	{
		$this->list->clear();
	}
 }