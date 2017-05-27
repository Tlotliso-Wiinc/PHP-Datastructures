<?php

namespace LinkedLists\Iterators;
use LinkedLists\Node;

/**
 * A class that works with Circular Linked Lists Iterators
 * for traversing elements in a LinkedList.
 *
 * @file    CircularLinkedListIterator.php
 * @author  Tlotliso Mafantiri
 */
 class CircularLinkedListIterator
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
	 * @var Node $tail: The last element in the list
	 */
	protected $tail;

	/**
	 * @var integer $counter: To keep track of the position of the iterator.
	 */
	protected $counter;

	/**
     * Constructor. Initialize the Iterator.
     *
     * @return void
     */
	function __construct($tail)
	{
		$this->tail = $tail;
		$this->head = $tail->next();
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
		$this->counter = 0;
	}

	/**
     * Check if there is a next element in the list
     *
     * @return boolean
     */
	public function hasNext()
	{
		return ($this->current != $this->head || $this->counter == 0);
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
		$this->counter++;
		return $temp;
	}
	
 }