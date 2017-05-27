<?php

namespace LinkedLists;
use LinkedLists\DNode;

/**
 * A class that works with Doubly Linked Lists.
 *
 * @file    DoublyLinkedList.php
 * @author  Tlotliso Mafantiri
 */
class DoublyLinkedList
{
	/**
	 * @var Node $head: The first element in the list
	 */
	protected $head;

	/**
	 * @var Node $tail: The last element in the list
	 */
	protected $tail;

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
		$this->tail = null;
		$this->size = 0;
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
	 * Get the first element in the list
	 * 
	 * @return Node $head: The first element in the list
	 */
	public function getFirst()
	{
		return $this->head;
	}

	/**
     * Add an element at the head of the list.
     *
     * @param mixed $value: A value stored in a new node
     * @return void
     */
	public function addFirst($value)
	{
		$this->head = new DNode($value, $this->head, null);
		if ($this->tail == null) {
			$this->tail = $this->head;
		}
		$this->size++;
	}

	/**
     * Add an element at the tail of the list.
     *
     * @param mixed $value: A value stored in a new node
     * @return void
     */
	public function addLast($value)
	{
		$this->tail = new DNode($value, null, $this->tail);
		if ($this->head == null) {
			$this->head = $this->tail;
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
		if ($this->size == 0) return null;
		$temp = $this->tail;
		$this->tail = $this->tail->prev();
		if ($this->tail == null) {
			$this->head = null;
		} else {
			$this->tail->setNext(null);
		}
		$this->size--;
		return $temp->value();
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
		while ($node != null && $node->value() != $value) {
			$node = $node->next();
		}
		if ($node != null) {
			if ($node->prev() != null) {  // Fix next field of elemet above
				$node->prev()->setNext($node->setNext());
			} else {
				$this->head = $node->next();
			}
			if ($node->next() != null) { // Fix previous field of element below
				$node->next()->setPrev($node->prev());
			} else {
				$this->tail = $node->prev();
			}
			$this->size--;
			return $node->value();
		} 
		return null;
	}

	/**
	 * Get the last index of the specified value
	 * 
	 * @param mixed $value
	 * @return integer 
	 */
	public function lastIndexOf($value)
	{
		$i = $this->size - 1;
		$node = $this->tail;
		while ($node != null && $node->value() != $value) {
			$node = $node->prev();
			$i--;
		}
		if ($node == null) { // Value not found, return indicator
			return -1;
		} else {  // Value found, return index
			return $i;
		}
	}
}