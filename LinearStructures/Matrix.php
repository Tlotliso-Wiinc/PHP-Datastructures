<?php

namespace LinearStructures;

use LinearStructures\Vector;
use LinearStructures\Iterators\MatrixIterator;

/**
 * A Matrix class. It is implemented by using
 * a Vector data structure
 *
 * @file    Matrix.php
 * @author  Tlotliso Mafantiri
 */
 class Matrix
 {
 	/**
 	 * @var integer $height: The number of rows in the Matrix
 	 */
 	protected $height;

 	/**
 	 * @var integer $width: The number of columns in the Matrix
 	 */
 	protected $width;

 	/**
 	 * @var Vector $rows: A vector of row vectors
 	 */
 	protected $rows;

 	/**
     * Constructor. Initialize the Matrix.
     *
     * @param integer $h: The number of rows in the Matrix
     * @param integer $w: The number of columns in the Matrix
     * @return void
     */
	function __construct($h, $w)
	{
		$this->height = $h;
		$this->width = $w;
		$this->rows = new Vector($this->height); // allocate a vector of rows
		for($r = 0; $r < $this->height; $r++) {  
			// each row is allocated and filled with nulls
			$row = new Vector($this->width);
			for($c = 0; $c < $this->width; $c++) {
				$row->add(null);
			}
			$this->rows->add($row);
		}
	}

	/**
	 * Get the height (number of rows)
	 * 
	 * @return integer
	 */
	public function height()
	{
		return $this->height;
	}

	/**
	 * Get the width (number of columns)
	 * 
	 * @return integer
	 */
	public function width()
	{
		return $this->width;
	}

	/**
	 * Get the element at the specified position
	 * 
	 * @param integer $row
	 * @param integer $col
	 * @return mixed
	 */
	public function get($row, $col)
	{
		if ($row < 0 || $row >= $this->height ||
			$col < 0 || $col >= $this->width) {
			return null;
		}
		$row = $this->rows->get($row);
		return $row->get($col);
	}

	/**
	 * Set the element at the specified position
	 * 
	 * @param integer $row
	 * @param integer $col
	 * @param mixed $element: The new element
	 * @return mixed
	 */
	public function set($row, $col, $element)
	{
		if ($row < 0 || $row >= $this->height ||
			$col < 0 || $col >= $this->width) {
			return null;
		}
		$row = $this->rows->get($row);
		return $row->set($col, $element);
	}

	/**
	 * Add a new row
	 * 
	 * @param integer $r
	 * @return void
	 */
	public function addRow($r)
	{
		if($r >= 0 && $r < $this->height) {
			$row = new Vector($this->width);
			for($c = 0; $c < $this->width; $c++) {
				$row->add(null);
			}
			$this->rows.addAt($r, $row);
		}
	}

	/**
	 * Get the Iterator for traversing all the elements
	 * 
	 * @return Iterator
	 */ 
	public function iterator()
	{
		return new MatrixIterator($this);
	}

	/**
	 * Check if an element is contained in the matrix
	 * 
	 * @param mixed $element
	 * @return boolean 
	 */
	public function contains($element)
	{
		$elements = $this->iterator();

		while ($elements->hasNext()) {
			if ($elements->next()->equals($element)) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Remove all elements from the matrix
	 * 
	 * @return void
	 */
	public function clear()
	{
		$this->rows->clear();
	}
 }