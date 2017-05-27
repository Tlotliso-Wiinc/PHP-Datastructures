<?php

namespace OrderedStructures;
use Interfaces\Comparator;

/**
 * Class NaturalComparator
 * 
 * Used for comparing elements while ordering
 * or sorting.
 *
 * @file    NaturalComparator.php
 * @author  Tlotliso Mafantiri
 * 
 * @package OrderedStructures
 */
class NaturalComparator implements Comparator
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
	public function compare($a, $b)
	{
		return $a->compareTo($b);
	}

	/**
	 * Check if an object is of type NaturalComparator
	 * 
	 * @return boolean
	 */ 
	public function equals($b)
	{
		return ($b != null) && ($b instanceof NaturalComparator);
	}
}