<?php

namespace Trees\BinaryTrees\Iterators;
use Trees\BinaryTrees\BinaryTree;
use LinearStructures\Queue;
use Interfaces\Iterator;

/**
 * A level-order traversal Iterator
 * for traversing elements in a Binary Tree.
 *
 * @file    BTLevelorderIterator.php
 * @author  Tlotliso Mafantiri
 */
class BTLevelorderIterator implements Iterator
{
	/**
	 * @var BinaryTree $root: The root of traversed subtree
	 */
	protected $root;

	/**
	 * @var Queue $todo: A queue of unvisited relatives
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
		$this->todo = new Queue();
		$this->reset();
	}

	/**
     * Reset the Iterator to root Node
     *
     * @return void
     */
	public function reset()
	{
		$this->todo->clear();
		if (!$this->root->isEmpty()) {
			$this->todo->enqueue($this->root);
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
	 * Get a reference to the current value
	 * 
	 * @return $mixed
	 */
	public function get()
	{
		return $this->todo->get()->value();
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
		$current = $this->todo->dequeue();
		$result = $current->value();
		if (!$current->left()->isEmpty()) {
		 	$this->todo->enqueue($current->left());
		}
		if (!$current->right()->isEmpty()) {
		 	$this->todo->enqueue($current->right());
		}  
		return $result;
	}
}