<?php

namespace LinkedLists\Iterators;
use LinkedLists\Node;

/**
 * A class that works with Singly Linked Lists Iterators
 * for traversing elements in a LinkedList.
 *
 * @file    LinkedListIterator.php
 * @author  Tlotliso Mafantiri
 */
 class LinkedListIterator
 {
 	/**
	 * @var Node $current: The current element in the list
	 */
	protected $current;

	/**
	 * @var Node $head: The first element in the list
	 */
	protected $head;

	/**
     * Constructor. Initialize the Iterator.
     *
     * @return void
     */
	function __construct($head)
	{
		$this->head = $head;
		$this->reset();
	}

	/**
     * Reset the Iterator to the beginning of the traversal
     *
     * @return void
     */
	public function reset()
	{
		$this->current = $this->head;
	}

	/**
     * Check if there is a next element in the list
     *
     * @return boolean
     */
	public function hasNext()
	{
		return $this->current != null;
	}

	/**
     * Go to the next element
     * 
     * This returns the current value and increments the iterator
     * if there are more elements available in the list.
     *
     * @return $mixed
     */
	public function next()
	{
		$temp = $this->current->value();
		$this->current = $this->current->next();
		return $temp;
	}
	
 }