<?php

namespace Maps;

use LinkedLists\LinkedList;
use Interfaces\Map;
use Maps\Association;
use LinearStructures\SetList;

/**
 * Class MapList
 * 
 * This is a List based implementation of a Map.
 * An Association is used to store the key-value
 * pairs and the type of the list that is used 
 * to store all the key-value pairs is a 
 * Singly Linked List.
 * 
 * @file MapList.php
 * @author Tlotliso Mafantiri
 * 
 * @package Maps
 * 
 * @property LinkedLists\LinkedList $data
 */
class MapList implements Map
{
	/**
	 * @var LinkedList $data 
	 */
	protected $data;

	/**
     * Constructor. Initialize the MapList
     *
     * @return void
     */
	function __construct($source = null)
	{
		$this->data = new LinkedList();

		if ($source != null) {
			$this->putAll($source);
		}
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
		$temp = new Association($key, $value);
		$result = $this->data->remove($temp);
		$this->data->add($temp);

		if ($result == null) {
			return null;
		} else {
			return $result->getValue();
		}
	}

	/**
	 * Remove a mapping with a specified key
	 * 
	 * @param mixed $key
	 * @return mixed 
	 */
	public function remove($key)
	{

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
	 * Get a set of all keys associated with the map
	 * 
	 * @return Set
	 */
	public function keySet()
	{
		$result = new SetList();
		$i = $this->data->iterator();

		while ($i->hasNext()) {
			$a = $i->next();
			$result->add($a->getKey());
		}

		return $result;
	}

	/**
	 * Get a set of key-value pairs generated from this map
	 * 
	 * @return Set 
	 */
	public function entrySet()
	{
		$result = new SetList();
		$i = $this->data->iterator();

		while ($i->hasNext()) {
			$a = $i->next();
			$result->add($a);
		}

		return $result;
	}

	/**
	 * Get a structure that contains the range of the map
	 * 
	 * @return Structure
	 */
	public function values()
	{
		$result = new LinkedList();
		$i = $this->data->iterator();

		while ($i->hasNext()) {
			$a = $i->next();
			$result->add($a->getValue());
		}

		return $result;
	}

	/**
	 * Check if the map has a specified key
	 * 
	 * @param mixed $key
	 * @return boolean
	 */
	public function containsKey($key)
	{

	}

	/**
	 * Check if the map contains a value
	 * 
	 * @param mixed $key
	 * @return boolean 
	 */
	public function containsValue($value)
	{

	}

	/**
	 * Check if the map contains any entries
	 * 
	 * @return boolean 
	 */
	public function isEmpty()
	{
		return $this->data->isEmpty();
	}

	/**
	 * Get the number of entries in the map
	 * 
	 * @return integer 
	 */
	public function size()
	{
		return $this->data->size();
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
	 * Remove all Map entries
	 * 
	 * @return void 
	 */
	public function clear()
	{
		$this->data->clear();
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