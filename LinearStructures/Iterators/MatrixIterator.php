<?php

namespace LinearStructures\Iterators;

use LinearStructures\Matrix;
use Interfaces\Iterator;

/**
 * A Matrix Iterator Class
 * 
 * This class implements the Iterator interface
 * and traverses all elements in a matrix
 * 
 * @package Iterators
 */ 
class MatrixIterator implements Iterator
{
	/**
	 * @var Matrix $matrix: the matrix to traverse
	 */ 
	protected $matrix;

	/**
	 * @var integer $currentRow: the current row index
	 */ 
	protected $currentRow;

	/**
	 * @var integer $currentCol: the current column index
	 */ 
	protected $currentCol;

	/**
	 * Constructor. Initialize the Iterator
	 * 
	 * @return void 
	 */
	function __construct(Matrix $m)
	{
		$this->matrix = $m;
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
		$this->currentRow = 0;
		$this->currentCol = 0;
	}

	/**
	 * Move to the next row
	 * 
	 * @return void
	 */ 
	private function move()
	{
		$this->currentRow++;
		$this->currentCol = 0;
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
		return $this->currentRow < $this->matrix->height()
			&& $this->currentCol < $this->matrix->width();
	}

	/**
	 * Get the current value
	 * 
	 * @return mixed 
	 */
	public function get()
	{
		return $this->matrix->get($this->currentRow, $this->currentCol);
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
		$val = $this->get();
		$this->currentCol++;

		if ($this->currentCol >= $this->matrix->width()) {
			$this->move(); // move to the next row
		}

		return $val;
	}
}