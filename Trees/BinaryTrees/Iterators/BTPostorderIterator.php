<?php

namespace Trees\BinaryTrees\Iterators;
use Trees\BinaryTrees\BinaryTree;
use LinearStructures\Stack;
use Interfaces\Iterator;

/**
 * A post order traversal Iterator
 * for traversing elements in a Binary Tree.
 *
 * @file    BTPostorderIterator.php
 * @author  Tlotliso Mafantiri
 */
class BTPostorderIterator implements Iterator
{
	/**
	 * @var BinaryTree $root: The root of the subtree to be traversed
	 */
	protected $root;

	/**
	 * @var Stack $todo: A stack of Nodes whose descendents are currently being visited
	 */
	protected $todo;

	/**
     * Constructor. Initialize the Iterator.
     *
     * @return void
     */
	function __construct($root)
	{
		$this->root = $root;
		$this->todo = new Stack();
		$this->reset();
	}

	/**
     * Reset the Iterator to retraverse
     *
     * @return void
     */
	public function reset()
	{
		$this->todo->clear();
		// stack is empty. Push on nodes from root to
		//left most descendent
		$current = $this->root;
		while (!$current->isEmpty()) {
			$this->todo->push($current);
			if (!$current->left()->isEmpty()) {
				$current = $current->left();
			} else {
				$current = $current->right();
			}
		}
	}

	/**
     * Check if there is a next element to be visited
     * 
     * This returns true if and only if the iterator
     * is not finished
     *
     * @return boolean
     */
	public function hasNext()
	{
		return !$this->todo->isEmpty();
	}

	/**
     * Go to the next element
     * 
     * This returns the current value and increments the iterator
     * if there are more elements to be traversed.
     *
     * @return $mixed
     */
	public function next()
	{
		$current = $this->todo->pop();
		$result = $current->value();
		if ($this->todo->size() > 0) {
			$parent = $this->todo->get();
			if ($current == $parent->left()) {
				$current = $parent->right();
				while (!$current->isEmpty()) {
					$this->todo->push($current);
					if (!$current->left()->isEmpty()) {
						$current = $current->left();
					} else {
						$current = $current->right();
					}
				}
			}
		}
		return $result;
	}
}