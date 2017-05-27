<?php

namespace LinearStructures;
use LinearStructures\Vector;

/**
 * An Ordered Vector Class
 *
 * @file    OrderedVector.php
 * @author  Tlotliso Mafantiri
 */
class OrderedVector
{
	/**
	 * @var Vector $data: A vector that stores all elements in ascending order
	 */
	protected $data;

	/**
     * Constructor. Initialize the Ordered Vector
     *
     * @return void
     */
	function __construct()
	{
		$this->data = new Vector();
	}
}