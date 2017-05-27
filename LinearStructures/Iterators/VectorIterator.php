<?php

namespace LinearStructures\Iterators;

use LinearStructures\Vector;
use Interfaces\Iterator;

/**
 * A Vector Iterator Class
 * 
 * This class implements the Iterator interface
 * and traverses all elements in a vector.
 * 
 * @file VectorIterator.php
 * @author Tlotliso Mafantiri
 * 
 * @package LinearStructures 
 * 
 * @property Vector $vector
 * @property integer $current
 */
class VectorIterator implements Iterator
{
	/**
	 * @var Vector $vector: the vector to traverse
	 */
	protected $vector;

	/**
	 * @var integer $current: the current index 
	 */
	protected $current;
	
	/**
     * Constructor. Initialize the Iterator.
     *
     * @return void
     */
	function __construct(Vector $v)
	{
		$this->vector = $v;
		$this->reset();
	}

	/**
	 * Reset the iterator
	 * 
	 * The iterator is set to the beginning 
	 * of a traversal.
	 * 
	 * @return void
	 */
	public function reset()
	{
		$this->current = 0;
	}

	/**
	 * Check if there is a next element
	 * 
	 * Returns true if there is at least one more value
	 * to visit 
	 * 
	 * @return boolean
	 */
	public function hasNext()
	{
		return $this->current < $this->vector->size();
	}

	/**
	 * Get the current value
	 * 
	 * @return mixed 
	 */
	public function get()
	{
		return $this->vector->get($this->current);
	}

	/**
	 * Go to the next element
	 * 
	 * This returns the current element and 
	 * increments the iterator.
	 * 
	 * @return mixed 
	 */
	public function next()
	{
		return $this->vector->get($this->current++);	
	}
}