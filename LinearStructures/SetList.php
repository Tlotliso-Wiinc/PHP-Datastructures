<?php

namespace LinearStructures;
use LinearStructures\Vector;

/**
 * Class SetList
 * 
 * This is a List based implementation of a Set.
 * A Vector is used to store all elements.
 * 
 * @file SetList.php
 * @author Tlotliso Mafantiri
 * 
 * @package LinearStructures
 * 
 * @property LinearStructures\Vector $data
 */
class SetList
{
	/**
	 * @var LinearStructures\Vector $data 
	 */
	protected $data;

	/**
     * Constructor. Initialize the SetList
     *
     * @return void
     */
	function __construct($source = null)
	{
		$this->data = new Vector();

		if ($source != null) {
			$this->addAll($source);
		}
	}

	/**
	 * Remove an element
	 * 
	 * @param mixed $element
	 * @return mixed 
	 */
	public function remove($element)
	{
		$index = $this->data->indexOf($element);

		if ($index >= 0) {
			return $this->data->remove($index);
		}

		return null;
	}

	/**
	 * Add an element to the set
	 * 
	 * @param mixed $element
	 * @return void 
	 */
	public function add($element)
	{
		if (!$this->data->contains($element)) {
			$this->data->add($element);
		}
	}

	/**
	 * Add all values found in another structure
	 * 
	 * @param Structure $other
	 * @return void 
	 */ 
	public function addAll($other)
	{
		$elements = $other->iterator();

		while ($elements->hasNext()) {
			$this->add($elements->next());
		}
	}

	/**
	 * Check if an element is contained in the set
	 * 
	 * @param mixed $element
	 * @return boolean
	 */
	public function contains($element)
	{
		return $this->data->contains($element);
	}

	/**
	 * Get the iterator for traversing the set
	 * 
	 * @return Iterator
	 */ 
	public function iterator()
	{
		return $this->data->iterator();
	}
}