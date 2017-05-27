<?php

namespace LinkedLists;

/**
 * A class for Nodes in a Linked List.
 *
 * @file    Node.php
 * @author  Tlotliso Mafantiri
 */
class Node
{
	/**
	 * @var mixed $value: The value stored in the Node
	 */
	protected $value;

	/**
	 * @var Node $next: A reference to the next Node (element)
	 */
	protected $next;

	/**
     * Constructor. Initialize the Node.
     *
     * @param mixed $_value: A value to be stored in the node
     * @param Node $_next: The next element
     * @return void
     */
	function __construct($_value, $_next = null)
	{
		$this->value = $_value;
		$this->next = $_next;
	}

	/**
     * Get the next element
     *
     * @return Node $next
     */
	public function next()
	{
		return $this->next;
	}

	/**
     * Set the next element
     *
     * @param Node $next: The next element
     * @return void
     */
	public function setNext($next)
	{
		$this->next = $next;
	}

	/**
     * Get the value stored in the node
     *
     * @return mixed $value
     */
	public function value()
	{
		return $this->value;
	}

	/**
     * Set the value
     *
     * @param mixed $value: A value to be stored in the node
     * @return void
     */
	public function setValue($value)
	{
		$this->value = $value;
	}
}