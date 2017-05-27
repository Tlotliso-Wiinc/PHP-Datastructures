<?php

namespace Interfaces;

/**
 * A Comparator interface.
 * 
 * This contains one method to be implemented by
 * classes that require to compare objects while
 * ordering or sorting elements.
 *
 * @file    Comparator.php
 * @author  Tlotliso Mafantiri
 * 
 * @package Interfaces
 */
interface Comparator
{
	/**
	 * compare two objects
	 * 
	 * This returns an integer and the relationship of this
	 * integer to zero representsthe relationship between $a
	 * and $b. The magnitude of the result is unimportant,
	 * other than being zero, greater than or less than zero.
	 * The two objects must be of the same type.
	 * 
	 * @param mixed $a
	 * @param mixed $b
	 * @return integer
	 */ 
	public function compare($a, $b);
}