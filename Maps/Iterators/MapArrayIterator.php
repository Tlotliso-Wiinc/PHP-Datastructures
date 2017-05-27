<?php

namespace Maps\Iterators;

use Interfaces\Iterator;
use Maps\MapArray;
use Maps\Association;

/**
 * A MapArrayIterator Class
 * 
 * @package Maps\Iterators
 */ 
class MapArrayIterator implements Iterator
{
	/**
	 * @var MapArray $data: the Map to traverse
	 */
	protected $data;

	/**
	 * @var integer $current: the current index 
	 */
	protected $current;

	/**
     * Constructor. Initialize the Iterator.
     *
     * @return void
     */
	function __construct(MapArray $m)
	{
		$this->data = $m;
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
		return $this->current < $this->data->size();
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