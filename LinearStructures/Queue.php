<?php

namespace LinearStructures;

use LinkedLists\CircularLinkedList;
use LinkedLists\LinkedList;

/**
 * A class that works with Queues
 *
 * @file    Queue.php
 * @author  Tlotliso Mafantiri
 * 
 * @package LinearStructures
 */
 class Queue
 {
 	/**
 	 * @var LinkedList $data: A list for holding all elements
 	 */
 	protected $data;

 	/**
     * Constructor. Initialize the Queue
     *
     * @return void
     */
	function __construct()
	{
		$this->data = new LinkedList();
	}

	/**
     * Add an item to a Queue
     * 
     * The value is added to the tail of
     * the structure
     *
     * @param mixed $item
     * @return void
     */
	public function add($item)
	{
		$this->data->addLast($item);
	}

	/**
     * Add an item to a Queue
     * 
     * The value is added to the tail of
     * the structure
     *
     * @param mixed $item
     * @return void
     */
	public function enqueue($item)
	{
		$this->add($item);
	}

	/**
     * Remove an item from a stack
     * 
     * The head of the queue is removed
     * and returned
     *
     * @return void
     */
	public function remove()
	{
		return $this->data->removeFirst();
	}

	/**
     * Remove an item from a stack
     * 
     * The head of the queue is removed
     * and returned
     *
     * @return void
     */
	public function dequeue()
	{
		return $this->remove();
	}

	/**
	 * Get the first element
	 * 
	 * The element at the head of the queue 
	 * is returned
	 * 
	 * @return mixed
	 */
	public function get()
	{
		return $this->data->getFirst();
	}

	/**
	 * Get the first element
	 * 
	 * The element at the head of the queue 
	 * is returned
	 * 
	 * @return mixed
	 */
	public function getFirst()
	{
		return $this->get();
	}

	/**
	 * Get the first element
	 * 
	 * The element at the head of the queue 
	 * is returned
	 * 
	 * @return mixed
	 */
	public function peek()
	{
		return $this->get();
	}

	/**
     * Get the number of elements in the queue
     *
     * @return integer
     */
	public function size()
	{
		return $this->data->size();
	}


	/**
	 * Get the Iterator for traversing the elements
	 * 
	 * @return CircularLinkedListIterator
	 */
	public function iterator()
	{
		return $this->data->iterator();
	}

	/**
     * Check if the stack is empty
     * 
     * This returns a boolean value of true if
     * and only if the queue is empty
     *
     * @return void
     */
	public function isEmpty()
	{
		return $this->data->isEmpty();
	}

	/**
	 * Remove all elements from the queue
	 * 
	 * @return void
	 */
	public function clear()
	{
		$this->data->clear();
	}
 }