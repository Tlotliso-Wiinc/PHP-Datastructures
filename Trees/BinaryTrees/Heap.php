<?php

namespace Trees\BinaryTrees;
use Trees\BinaryTrees\BinaryTree;

/**
 * A Binary Tree implementation of an incomplete Heap
 * (Skew Heap)
 *
 * @file    Heap.php
 * @author  Tlotliso Mafantiri
 */
class Heap
{
	/**
	 * @var BinaryTree $root: the root of the tree
	 */
	protected $root;

	/**
	 * @var BinaryTree $EMPTY: an empty binary tree
	 */ 
	protected final $EMPTY = new BinaryTree();

	/**
	 * @var integer $count: the number of elements in the heap
	 */ 
	protected $count;

	/**
     * Constructor. Initialize the Heap
     *
     * @return void
     */
	function __construct()
	{
		$this->root = $EMPTY;
		$this->count = 0;
	}

	/**
	 * Get the minimum value in the Priority Queue (Heap)
	 * 
	 * This returns the value at the root since it is
	 * the smallest value
	 * 
	 * @return mixed 
	 */
	public function getFirst()
	{
		return $this->root->value();
	}

	/**
	 * Merge two heaps together
	 * 
	 * @param Heap $left: The left Heap
	 * @param Heap $right: The right Heap
	 * @return Heap  
	 */
	protected function merge($left, $right)
	{
		if ($left->isEmpty()) {
			return $left;
		}
		if ($right->isEmpty()) {
			return $right;
		}
		if ($right->value()->compareTo($left->value()) < 0) {
			$result = $this->merge($right, $left);
		} else {
			$result = $left;
			if ($result->left()->isEmpty()) {
				$result->setLeft($right);
			} else {
				$temp = $result->right();
				$result->setRight($result->left());
				$result->setLeft($this->merge($temp, $right));
			}
		}
		return $result;
	}

	/**
	 * Add a new value
	 * 
	 * @param mixed $value
	 * @return void
	 */
	public function add($value)
	{
		$smallTree = new BinaryTree($value, $this->EMPTY, $this->EMPTY);
		$this->root = $this->merge($smallTree, $this->root);
		$count++;
	}

	/**
	 * Remove the minimum value from the Heap
	 * 
	 * This deletes and returns the value at 
	 * the root of the Heap.
	 * 
	 * @return $mixed
	 */ 
	public function remove()
	{
		$result = $this->root->value();
		$this->root = $this->merge($this->root->left(), $this->root->right());
		$this->count--;
		return $return;
	}
}