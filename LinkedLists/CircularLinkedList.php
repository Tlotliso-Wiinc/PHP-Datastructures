<?php
namespace LinkedLists;
use LinkedLists\Node;
use LinkedLists\Iterators\CircularLinkedListIterator;

/**
 * A class that works with Singly Linked Lists.
 *
 * @file    LinkedList.php
 * @author  Tlotliso Mafantiri
 */
class CircularLinkedList
{
	/**
	 * @var Node $tail: The last element in the list
	 */
	protected $tail;

	/**
	 * @var integer $size: The number of nodes in the list
	 */
	protected $size;

	/**
     * Constructor. Initialize the linked list.
     *
     * @return void
     */
	function __construct()
	{
		$this->tail = null;
		$this->size = 0;
	}

	/**
     * Get the size (number of nodes) of the list
     *
     * @return integer
     */
	public function size()
	{
		return $this->size;
	}

	/**
	 * Get the value of the first element in the list
	 * 
	 * @return mixed
	 */
	public function getFirst()
	{
		if (!$this->isEmpty()) {
			return $this->tail->next()->value();
		}
	}

	/**
     * Add an element at the head of the list.
     *
     * @param mixed $value: A value stored in a new node
     * @return void
     */
	public function addFirst($value)
	{
		$temp = new Node($value);

		if ($this->tail == null) {
			$this->tail = $temp;
			$this->tail->setNext($this->tail);
		} else { 
			$temp->setNext($this->tail->next());
			$this->tail->setNext($temp);
		}

		$this->size++;
	}

	/**
     * Remove the first element
     * 
     * This removes and returns the value of the element
     * at the beginning of the list.
     *
     * @return mixed $value
     */
	public function removeFirst()
	{
		if (!$this->isEmpty()) {
			$head = $this->tail->next();
			$this->tail->setNext($head->next());
			$this->size--;
			return $head->value();
		}
	}

	/**
	 * Get the value of the last element in the list
	 * 
	 * @return mixed
	 */
	public function getLast()
	{
		if (!$this->isEmpty()) {
			return $this->tail->value();
		}
	}

	/**
     * Add an element at the tail of the list.
     *
     * @param mixed $value: A value stored in a new node
     * @return void
     */
	public function addLast($value)
	{
		$this->addFirst($value);
		$this->tail = $this->tail->next();
	}

	/**
     * Remove the last element
     * 
     * This removes and returns the value of the element
     * at the end of the list.
     *
     * @return mixed $value
     */
	public function removeLast()
	{
		if (!$this->isEmpty()) {
			$current = $this->tail;

			while ($current->next() != $this->tail) {
				$current = $current->next();
			}

			$temp = $this->tail;

			if ($current == $this->tail) {
				$this->tail = null;
			} else {
				$current->setNext($this->tail->next());
				$this->tail = $current;
			}

			$this->size--;

			return $temp->value();
		}
	}

	/**
	 * Get the Iterator for traversing the elements
	 * 
	 * @return CircularLinkedListIterator
	 */
	public function iterator()
	{
		return new CircularLinkedListIterator($this->tail);
	}

	/**
	 * Check if the is list empty
	 * 
	 * @return boolean
	 */
	public function isEmpty()
	{
		return $this->size() == 0;
	}

	/**
	 * Remove all elements from the list
	 * 
	 * @return void
	 */
	public function clear()
	{
		$this->tail = null;
		$this->size = 0;
	}
}