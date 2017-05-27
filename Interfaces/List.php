<?php

namespace Interfaces;

/**
 * A List Interface
 * 
 * @file List.php
 * @author Tlotliso Mafantiri
 * 
 * @package Interfaces
 */
interface List
{
	/**
	 * Get number of elements in a list
	 * 
	 * @return integer 
	 */
	public function size();

	/**
	 * Check if the list has no elements
	 * 
	 * @return boolean 
	 */
	public function isEmpty();

	/**
	 * Empty the list
	 * 
	 * @return void
	 */ 
	public function clear();

	/**
	 * Add a value to the beginning of a list
	 * 
	 * @param mixed $value
	 * @return void
	 */ 
	public function addFirst($value);

	/**
	 * Add a value to the end of a list
	 * 
	 * @param mixed $value
	 * @return void
	 */ 
	public function addLast($value);

	/**
	 * Get the first value in the list
	 * 
	 * @return mixed
	 */ 
	public function getFirst();

	/**
	 * Get the last value in the list
	 * 
	 * @return mixed
	 */ 
	public function getLast();

	/**
	 * Remove the first value from the list
	 * 
	 * @return mixed 
	 */
	public function removeFirst();

	/**
	 * Remove the last value from the list
	 * 
	 * @return mixed 
	 */
	public function removeLast();

	/**
	 * Remove and return the specified value
	 * 
	 * @param mixed $value
	 * @return mixed 
	 */ 
	public function remove($value);

	/**
	 * Add a value to the tail of the list
	 * 
	 * @param $value
	 * @return void
	 */ 
	public function add($value);

	/**
	 * Remove the last value from the list
	 * 
	 * @return mixed 
	 */
	public function remove();

	/**
	 * Get the last value in the list
	 * 
	 * @return mixed
	 */ 
	public function get();

	/**
	 * Check if a value is contained in the list
	 * 
	 * This returns true if and only if the list
	 * contains an object equal to the specified
	 * value.
	 * 
	 * @param mixed $value
	 * @return boolean
	 */ 
	public function contains($value);

	/**
	 * Get the index or position of a value
	 * 
	 * @param mixed $value
	 * @return integer
	 */
	public function indexOf($value);

	/**
	 * Get the last index or position of a value
	 * 
	 * @param mixed $value
	 * @return integer
	 */
	public function lastIndexOf($value);

	/**
	 * Get an object found at the specified index
	 * 
	 * @param integer $index
	 * @return Object
	 */
	public function get($index);

	/**
	 * Set a value at the specified index in a list
	 * 
	 * @param integer $index
	 * @param mixed $value
	 */
	public function set($index, $value);

	/**
	 * Add an element at the specified index
	 * 
	 * @param integer $index
	 * @param mixed $value
	 * @return void
	 */ 
	public function add($index, $value);

	/**
	 * Remove and return an object found at that location
	 * 
	 * @param integer $index
	 * @return mixed
	 */ 
	public function remove($index);

	/**
	 * Get an iterator for traversing all elements in a list
	 * 
	 * @return Iterator
	 */ 
	public function iterator();
} 