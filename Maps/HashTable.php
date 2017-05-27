<?php

namespace Maps;
use Maps\MapList;
use Maps\Vector;

/**
 * Class HashTable
 * 
 * @file HashTable.php
 * @author Tlotliso Mafantiri
 * 
 * @package Maps
 * 
 * @property string $RESERVED = "RESERVED"
 * @property Vector $data
 * @property integer $count
 * @property double $maximumLoadFactor = 0.6
 */
class HashTable
{
	/**
	 * @var string $RESERVED
	 */ 
	protected static final $RESERVED = "RESERVED";

	/**
	 * @var Vector $data
	 */
	protected $data;

	/**
	 * @var integer $count 
	 */
	protected $count;

	/**
	 * @var double $maximumLoadFactor
	 */ 
	protected final $maximumLoadFactor = 0.6;

	/**
     * Constructor. Initialize the Hash Table.
     *
     * @return void
     */
	function __construct($initialCapacity = 997)
	{
		
	}
}