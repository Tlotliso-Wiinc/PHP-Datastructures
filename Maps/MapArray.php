<?php

namespace Maps;

use Interfaces\Map;
use LinearStructures\SetList;

/**
 * A MapArray Class
 * 
 * @package Maps
 */ 
class MapArray implements Map
{
	/**
	 * @var array $data: an associative array to hold the data
	 */ 
	protected $data;

	/**
     * Constructor. Initialize the MapArray
     *
     * @return void
     */
	function __construct()
	{
		$this->data = array();
	}

	/**
	 * Get the number of entries in the map
	 * 
	 * @return integer 
	 */
	public function size()
	{
		return count($this->data);
	}

	/**
	 * Check if the map contains any entries
	 * 
	 * @return boolean 
	 */
	public function isEmpty()
	{
		return $this->size() == 0;
	}

	/**
	 * Check if the map has a specified key
	 * 
	 * @param mixed $key
	 * @return boolean
	 */
	public function containsKey($key)
	{
		return array_key_exists($key, $this->data);
	}

	/**
	 * Check if the map has a specified key
	 * 
	 * @param mixed $value
	 * @return boolean
	 */
	public function containsValue($value)
	{
		return in_array($value, $this->data);
	}

	/**
	 * Get the value mapped to the specified key
	 * 
	 * This returns a value mapped to from the key,
	 * or null if the key is not found.
	 * 
	 * @param mixed key
	 * @return mixed 
	 */
	public function get($key)
	{
		if ($this->containsKey($key)) {
			return $this->data[$key];
		}

		return null;
	}

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
	public function put($key, $value)
	{
		if ($this->containsKey($key)) {
			$old = $this->get($key);
		} else {
			$old = null;
		}

		$this->data[$key] = $value;

		return $old;
	}

	/**
	 * Remove a mapping with a specified key
	 * 
	 * This returns the value removed or null if
	 * the key is not in the map.
	 * 
	 * @param mixed $key
	 * @return mixed 
	 */
	public function remove($key)
	{
		if ($this->containsKey($key)) {
			$old = $this->get($key);

			foreach ($this->data as $k => $v) {
				if ($k != $key) {    // Skip the key
					$new[$k] = $v;
				}
			} 

			$this->data = $new;
		} else {
			$old = null;
		}

		return $old;
	}

	/**
	 * Put map entries of another map into this map
	 * 
	 * @param Map $other
	 * @return void
	 */
	public function putAll($other)
	{

	}

	/**
	 * Remove all Map entries
	 * 
	 * @return void 
	 */
	public function clear()
	{
		$this->data = array();
	}

	/**
	 * Get a set of all keys associated with the map
	 * 
	 * @return Set
	 */
	public function keySet()
	{
		$keySet = new SetList();

		foreach ($this->data as $key => $value) {
			$keySet->add($key);
		}

		return $keySet;
	}

	/**
	 * Get a structure that contains the range of the map
	 * 
	 * @return Structure
	 */
	public function values()
	{

	}

	/**
	 * Get a set of key-value pairs generated from this map
	 * 
	 * @return Set 
	 */
	public function entrySet()
	{
		return $this->data;
	}

	/**
	 * Check if the map is equal to another map
	 * 
	 * @param Map $other
	 * @return boolean 
	 */
	public function equals($other)
	{

	}

	/**
	 * Get a hash code associated with this structure
	 * 
	 * @return integer
	 */
	public function hashCode()
	{

	}
}