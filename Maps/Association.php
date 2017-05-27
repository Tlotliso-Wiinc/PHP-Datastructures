<?php

namespace Maps;

/**
 * Class Association
 * 
 * This class is used to store key-value pairs
 * such that the key can not be modified.
 * 
 * @file Association.php
 * @author Tlotliso Mafantiri
 * 
 * @package Maps
 * 
 * @property mixed $key
 * @property mixed $value 
 */
class Association
{
	/**
	 * @var mixed $key: the key used to access the value.
	 */ 
	protected $key;

	/**
	 * @var mixed $value: the value stored 
	 */
	protected $value;

	/**
     * Constructor. Initialize the Association
     *
     * @return void
     */
	function __construct($key, $value = null)
	{
		$this->key = $key;
		$this->value = $value;
	}

	/**
	 * Get the key
	 * 
	 * @return mixed
	 */
	public function getKey()
	{
		return $this->key;
	}

	/**
	 * Get the value
	 * 
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * Set the value
	 * 
	 * This returns the old value that
	 * was stored in this association.
	 * 
	 * @param mixed $value
	 * @return 
	 */
	public function setValue($value)
	{
		$oldValue = $this->value;
		$this->value = $value;
		
		return $oldValue;
	}
}