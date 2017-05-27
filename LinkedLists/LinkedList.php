<?php

namespace LinkedLists;
use LinkedLists\Node;
use LinkedLists\Iterators\LinkedListIterator;

/**
 * A class that works with Singly Linked Lists.
 *
 * @file    LinkedList.php
 * @author  Tlotliso Mafantiri
 */
class LinkedList
{
	/**
	 * @var Node $head: The first element in the list
	 */
	protected $head;

	/**
	 * @var integer $size: The number of nodes in the list
	 */
	protected $size;
	
	/**
     * Constructor. Initialize the linked list.
     *
     * @return void
     */
	function __construct()
	{
		$this->head = null;
		$this->size = 0;
	}

	/**
     * Get the size (number of nodes) of the list
     *
     * @return size
     */
	public function size()
	{
		return $this->size;
	}

	/**
     * Get the size (number of nodes) of the list
     *
     * This traverses the entire list and counts
     * all the elements in the list
     * 
     * @return size
     */
	public function getSize()
	{
		$count = 0;
		$node = $this->head;
		while ($node != null) {
			$count++;
			$node = $node->next();
		}
		return $count;
	}

	/**
	 * Set the value of an element at a specified position
	 * 
	 * @param integer $i: The index or ith position in the list
	 * @param mixed $value
	 * @return Node $node
	 */
	public function set($i, $value)
	{

	}

	/**
	 * Get the element at a specified position
	 * 
	 * @param integer $i: The index or ith position in the list
	 * @return Node $node
	 */
	public function get($i)
	{

	}

	/**
	 * Get the value of the first element in the list
	 * 
	 * @return mixed
	 */
	public function getFirst()
	{
		return $this->head->value();
	}

	/**
     * Add an element at the head of the list.
     *
     * @param mixed $value: A value stored in a new node
     * @return void
     */
	public function addFirst($value)
	{
		$temp = $this->head;
		$this->head = new Node($value, $temp);
		$this->size++;
	}

	/**
     * Remove the first element
     * 
     * This removes and returns the value of the element
     * at the beginning of the list.
     *
     * @return mixed $value
     */
	public function removeFirst()
	{
		if($this->head != null) {
			$temp = $this->head;
			$this->head = $this->head->next(); // Move the head down the list
			$this->size--;
			return $temp->value();
		}
	}

	/**
     * Add an element at the tail of the list.
     *
     * @param mixed $value: A value stored in a new node
     * @return void
     */
	public function addLast($value)
	{
		$temp = new Node($value, null);
		if ($this->head != null) {
			$node = $this->head;
			while ($node->next() != null) {
				$node = $node->next();
			}
			$node->setNext($temp);
		} else {
			$this->head = $temp;
		}
		$this->size++;
	}

	/**
     * Remove the last element
     * 
     * This removes and returns the value of the element
     * at the end of the list.
     *
     * @return mixed $value
     */
	public function removeLast()
	{
		$node = $this->head;
		$prev = null;
		while ($node->next() != null) {     // Find end of list
			$prev = $node;
			$node = $node->next();
		}
		if ($prev == null) { 
			$this->head = null;
		} else {
			$prev->setNext(null);
		}
		$this->size--;
		return $node->value();
	}

	/**
	 * Check if the list contains a specified value
	 * 
	 * This returns a true boolean value if the specified
	 * value is contained in the list
	 * 
	 * @param mixed $value
	 * @return boolean
	 */
	public function contains($value)
	{
		$node = $this->head;
		while ($node != null && $node->value() != $value) {
			$node = $node->next();
		}
		return $node != null;
	}

	/**
	 * Remove first element with matching value (if any exists)
	 * 
	 * @param mixed $value
	 * @return mixed
	 */
	public function remove($value)
	{
		$node = $this->head;
		$prev = null;

		while ($node != null && $node->value() != $value) {
			$prev = $node;
			$node = $node->next();
		}

		if ($node != null) {
			if ($prev == null) {  // It is first
				$this->head = $prev->next();
			} else {
				$prev->setNext($node->next());
			}

			$this->size--;

			return $node->value();
		}

		return null;  // Didn't find it, return null
	}

	/**
	 * Add an element at a specified position
	 * 
	 * @param integer $i: The index or ith position in the list
	 * @param mixed $value
	 * @return void
	 */
	public function add($i, $value)
	{
		if ($i < 0 || $i > $this->size) {
			// Do nothing
		} elseif ($i == 0) {
			$this->addFirst($value);
		} elseif ($i == $this->size) {
			$this->addLast($value);
		} else {
			$prev = null;
			$node = $this->head;
			while ($i > 0) {       // Search for ith position or end of list
				$prev = $node;
				$node = $node->next();
				$i--;
			}
			$current = new Node($value, $node); // Create new value to insert in correct position
			$prev->setNext($current); // Make previous value point to new value
			$this->size++;
		}
	}

	/**
	 * Remove an element at a specified position
	 * 
	 * This removes and returns an object specified
	 * at that location
	 * 
	 * @param integer $i: The index or ith position in the list
	 * @return mixed $value: The value of the object at the specified location
	 */
	public function removeAt($i)
	{
		if ($i < 0 || $i >= $this->size) {
			// Do nothing
		} elseif ($i == 0) {
			$this->removeFirst();
		} elseif ($i == $this->size - 1) {
			$this->removeLast();
		} else {
			$prev = null;
			$node = $this->head;
			while ($i > 0) {       // Search for value indexed, keep track of previous
				$prev = $node;
				$node = $node->next();
				$i--;
			}
			$prev->setNext($node->next()); // Make previous value point to new value
			$this->size--;
			return $node->value();
		}
	}

	/**
	 * Get the Iterator for traversing the elements
	 * 
	 * @return LinkedListIterator
	 */
	public function iterator()
	{
		return new LinkedListIterator($this->head);
	}

	/**
	 * Check if the is list empty
	 * 
	 * @return boolean
	 */
	public function isEmpty()
	{
		return $this->size() == 0;
	}

	/**
	 * Remove all elements from the list
	 * 
	 * @return void
	 */
	public function clear()
	{
		$this->head = null;
		$this->size = 0;
	}
}