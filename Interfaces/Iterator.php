<?php

namespace Interfaces;

/**
 * An Iterator interface
 * 
 * @file Iterator.php
 * @author Tlotliso Mafantiri
 * 
 * @package Interfaces
 */
interface Iterator
{
	/**
	 * Check if there is a next element
	 * 
	 * Returns true if there is at least one more value
	 * to visit 
	 * 
	 * @return boolean
	 */
	public function hasNext();

	/**
	 * Get the next value to be visited
	 * 
	 * @return mixed 
	 */
	public function next();
}