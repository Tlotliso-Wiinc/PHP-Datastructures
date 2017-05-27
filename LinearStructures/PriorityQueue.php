<?php

namespace LinearStructures;
use LinearStructures\Vector;

/**
 * A Priority Queue Class
 *
 * @file    PriorityQueue.php
 * @author  Tlotliso Mafantiri
 */
class PriorityQueue
{
	/**
	 * @var Vector $data: A vector that stores all elements in ascending order
	 */
	protected $data;

	/**
     * Constructor. Initialize the Priority Queue
     *
     * @return void
     */
	function __construct()
	{
		$this->data = new Vector();
	}
}