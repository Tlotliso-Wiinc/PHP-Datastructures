<?php

namespace Interfaces;

/**
 * A Map Interface
 * 
 * @file Map.php
 * @author Tlotliso Mafantiri
 * 
 * @package Interfaces 
 */
interface Map
{
	/**
	 * Get the number of entries in the map
	 * 
	 * @return integer 
	 */
	public function size();

	/**
	 * Check if the map contains any entries
	 * 
	 * @return boolean 
	 */
	public function isEmpty();

	/**
	 * Check if the map has a specified key
	 * 
	 * @param mixed $key
	 * @return boolean
	 */
	public function containsKey($key);

	/**
	 * Check if the map contains a value
	 * 
	 * @param mixed $key
	 * @return boolean 
	 */
	public function containsValue($value);

	/**
	 * Get the value mapped to the specified key
	 * 
	 * This returns a value mapped to from the key,
	 * or null if the key is not found.
	 * 
	 * @param mixed key
	 * @return mixed 
	 */
	public function get($key);

	/**
	 * Insert a mapping from the key to the value
	 * 
	 * This returns the value replaced or null if
	 * the key is not in the map.
	 * 
	 * @param mixed $key
	 * @param mixed $value
	 * @return mixed
	 */
	public function put($key, $value);

	/**
	 * Remove a mapping with a specified key
	 * 
	 * @param mixed $key
	 * @return mixed 
	 */
	public function remove($key);

	/**
	 * Put map entries of another map into this map
	 * 
	 * @param Map $other
	 * @return void
	 */
	public function putAll($other);

	/**
	 * Remove all Map entries
	 * 
	 * @return void 
	 */
	public function clear();

	/**
	 * Get a set of all keys associated with the map
	 * 
	 * @return Set
	 */
	public function keySet();

	/**
	 * Get a structure that contains the range of the map
	 * 
	 * @return Structure
	 */
	public function values();

	/**
	 * Get a set of key-value pairs generated from this map
	 * 
	 * @return Set 
	 */
	public function entrySet();

	/**
	 * Check if the map is equal to another map
	 * 
	 * @param Map $other
	 * @return boolean 
	 */
	public function equals($other);

	/**
	 * Get a hash code associated with this structure
	 * 
	 * @return integer
	 */
	public function hashCode();
}