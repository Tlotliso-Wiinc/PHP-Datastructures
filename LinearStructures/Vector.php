<?php

namespace LinearStructures;
use LinearStructures\Iterators\VectorIterator;

/**
 * A class that works with Vectors.
 *
 * @file    Vector.php
 * @author  Tlotliso Mafantiri
 */
 class Vector
 {
 	/**
	 * @var array $data: An array that holds all the elements
	 */
	protected $data;

	/**
	 * @var integer $count: The number of elements in the vector 
	 */
	protected $count;

	/**
	 * The number of elements to be added to the array that
	 * holds the data should extension be required
	 * 
	 * @var integer $capacityIncrement:
	 */ 
	protected $capacityIncrement;

	/**
     * Constructor. Initialize the Vector.
     *
     * @param integer $capacity: Initial capacity of the vector
     * @return void
     */
	function __construct($capacity = 2, $capacityIncrement = 0)
	{
		$this->data = array($capacity);
		$this->count = 0;
		$this->capacityIncrement = $capacityIncrement;
	}
	
	/**
	 * Adjust the capacity to accomodate more elements
	 * 
	 * @param integer $minCapacity
	 * @return void
	 */
	private function ensureCapacity($minCapacity)
	{
		if (count($this->data) < $minCapacity) {
			$newLength = count($this->data);

			if ($this->capacityIncrement == 0) {
				if ($newLength == 0) {
					$newLength = 1;
				}

				while ($newLength < $minCapacity) {
					$newLength *= 2;
				}
			} else {
				while ($newLength < $minCapacity) {
					$newLength += $this->capacityIncrement;
				}
			}

			$newData = array($newLength);

			for($i = 0; $i < $this->count; $i++) {
				$newData[$i] = $this->data[$i];
			}

			$this->data = $newData;
		}
	}

	/**
	 * Get the element at the specified index
	 * 
	 * @param integer $index: The position of the element
	 * @return mixed
	 */
	public function get($index)
	{
		if ($index < 0 || $index >= count($this->data)) {
			return null;
		}

		return $this->data[$index];
	}

	/**
	 * Set the element at the specified index
	 * 
	 * @param integer $index: The position of the element
	 * @param mixed $element: The new element
	 * @return mixed $old: The old element
	 */
	public function set($index, $element)
	{
		if ($index < 0 || $index >= count($this->data)) {
			return null;
		}

		$old = $this->data[$index];
		$this->data[$index] = $element;

		return $old;
	}

	/**
	 * Add a new element to the vector
	 * 
	 * @param mixed $element
	 */
	public function add($element)
	{
		$this->ensureCapacity($this->count + 1);
		$this->data[$this->count] = $element;
		$this->count++;
	}

	/**
	 * Add a new element to the vector
	 * 
	 * Add the element at the specified index or
	 * position in the vector
	 * 
	 * @param integer $index
	 * @param mixed $element
	 */
	public function addAt($index, $element)
	{
		if ($index >= 0 && $index < $this->count) {
			$this->ensureCapacity($this->count + 1);

			// must copy from right to left to avoid destroying data
			for ($i = $this->count; $i > $index; $i--) {
				$this->data[$i] = $this->data[$i-1];
			}

			// assertion: i == index and element[index] is available
			$this->data[$index] = $element;
			$this->count++;
		}
	}

	/**
	 * Remove an element at the specified index
	 * 
	 * @param integer $index
	 */
	public function remove($index)
	{
		if ($index >= 0 && $index < $this->count) {
			$result = $this->get($index);
			$this->count--;

			while ($index < $this->count) {
				$this->data[$index] = $this->data[$index + 1];
				$index++;
			}

			$this->data[$this->count] = null; // free reference

			return $result;
		}
	}

	/**
	 * Check if an element is contained in the vector
	 * 
	 * @param mixed $element
	 * @return boolean 
	 */
	public function contains($element)
	{
		if ($this->indexOf($element) >= 0) {
			return true;
		}

		return false;
	}

	/**
	 * Get the index of the first occurance of an element
	 * 
	 * @param mixed $element
	 * @return integer
	 */
	public function indexOf($element)
	{
		for ($i = 0; $i < $this->size(); $i++) { 
			if ($this->get($i) == $element) {
				return $i;
			}
		}

		return -1;
	}

	/**
	 * Get the iterator for traversing all elements
	 * 
	 * @return Iterator
	 */
	public function iterator()
	{
		return new VectorIterator($this);
	}

	/**
	 * Check if the element is empty
	 * 
	 * This returns a true boolean value if and only if
	 * the vector has no elements or false otherwise
	 * 
	 * @return boolean
	 */
	public function isEmpty()
	{
		return size() == 0;
	}

	/**
	 * Get the size of the vector
	 * 
	 * @return boolean
	 */
	public function size()
	{
		return $this->count;
	}

	/**
	 * Remove all elements from the vector
	 * 
	 * @return void
	 */
	public function clear()
	{
		$this->data = array();
		$this->count = 0;
	}
 }