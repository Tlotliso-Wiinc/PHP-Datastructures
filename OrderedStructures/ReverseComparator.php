<?php

namespace OrderedStructures;

use OrderedStructures\NaturalComparator;
use Interfaces\Comparator;

/**
 * Class ReverseComparator
 * 
 * Used for reversing the order of elements based 
 * on another comparator like the NaturalComparator.
 * 
 * @file    ReverseComparator.php
 * @author  Tlotliso Mafantiri
 * 
 * @package OrderedStructures
 * 
 * @property Comparator $base
 */
class ReverseComparator implements Comparator
{
	/**
	 * @var Comparator $base: comparator whose ordering is reversed 
	 */
	protected $base;

	/**
     * Constructor. Initialize the Comparator
     *
     * @return void
     */
	function __construct($base = null)
	{
		if ($base == null) {
			$this->base = new NaturalComparator();
		} else {
			$this->base = $base;
		}
	}

	/**
	 * compare two objects
	 * 
	 * This returns an integer and the relationship of this
	 * integer to zero represents the relationship between $a
	 * and $b. The magnitude of the result is unimportant,
	 * other than being zero, greater than or less than zero.
	 * The two objects must be of the same type. We simply call the
     * compare method of the base Comparator and reverse its sign.
     * This effectively reverses the relation between values.
	 * 
	 * @param mixed $a
	 * @param mixed $b
	 * @return integer
	 */ 
	public function compare($a, $b)
	{
		return -$this->base->compare($a, $b);
	}
}