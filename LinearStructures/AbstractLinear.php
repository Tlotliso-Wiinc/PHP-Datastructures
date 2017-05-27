<?php

namespace LinearStructures;
use Interfaces\Linear;

/**
 * An abstract class for all linear data structures.
 *
 * @file    AbstractLinear.php
 * @author  Tlotliso Mafantiri
 */
abstract class AbstractLinear implements Linear
{
	/**
     * Add a value to a collection
     *
     * @param mixed $value
     * @return void
     */
	public function add($value)
	{

	}

	/**
     * Get a reference to next object to be removed
     *
     * @return object
     */
	public function get()
	{

	}

	/**
     * Remove an object from a collection
     *
     * @return void
     */
	public function remove()
	{

	}

	/**
     * Get the number of elements in the structure
     *
     * @return integer
     */
	public function size()
	{

	}

	/**
     * Check if the structure is empty
     * 
     * This returns a boolean value of true if
     * and only if the structure is empty
     *
     * @return void
     */
	public function empty()
	{

	}
}