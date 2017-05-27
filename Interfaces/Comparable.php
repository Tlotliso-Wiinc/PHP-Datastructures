<?php

namespace Interfaces;

/**
 * A Comparable interface.
 * 
 * This contains one method to be implemented by
 * classes that require to compare objects while
 * ordering or sorting elements.
 *
 * @file    Comparable.php
 * @author  Tlotliso Mafantiri
 */
interface Comparable
{
	/**
	 * compare an object to another
	 * 
	 * This returns an integer and the relationship of this
	 * integer to zero representsthe relationship between $this
	 * and $that. The magnitude of the result is unimportant,
	 * other than being zero, greater than or less than zero. 
	 * 
	 * @param mixed $that: An object being compared to
	 * @return integer
	 */ 
	public function compareTo($that);
}