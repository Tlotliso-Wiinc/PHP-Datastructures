<?php

namespace Trees\BinaryTrees;

use Trees\BinaryTrees\BinaryTree;
use Interfaces\Comparator;
use OrderedStructures\NaturalComparator;

/**
 * A Binary Search Tree
 *
 * @file    BinarySearchTree.php
 * @author  Tlotliso Mafantiri
 */
class BinarySearchTree
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
	 * @var Comparator $ordering: the comparison object
	 */ 
	protected $ordering;

	/**
     * Constructor. Initialize the Heap
     *
     * @return void
     */
	function __construct($ordering = null)
	{
		$this->root = $EMPTY;
		$this->count = 0;

		if ($ordering == null) {
			$this->ordering = new NaturalComparator();
		} else {
			$this->ordering = $ordering;
		}
	}

	/**
	 * Get the location for the value 
	 * 
	 * This returns a reference to the location that identifies
	 * the correct point of insertion for the new value.
	 * 
	 * @param BinaryTree $root
	 * @param mixed $value
	 * @return BinaryTree
	 */ 
	public function locate($root, $value)
	{
		$rootValue = $root->value();

		if ($rootValue->equals($value)) {
			return $root;
		}

		if ($ordering->compare($rootValue, $value) < 0) {
			$child = $root->right();
		} else {
			$child = $root->left();
		}

		if ($child->isEmpty()) {
			return $root;
		} else {
			return locate($child, $value);
		}
	}

	/**
	 * Check if a value is contained in the tree
	 * 
	 * @param mixed value
	 * @return boolean
	 */
	public function contains($value)
	{
		if ($this->root->isEmpty()) {
			return false;
		}

		$possibleLocation = $this->locate($this->root, $value);

		return $value->equals($possibleLocation->value());
	}

	/**
	 * Add a value to the tree
	 * 
	 * @param mixed $value
	 * @return void
	 */
	public function add($value)
	{
		$newNode = new BinaryTree($value, $EMPTY, $EMPTY);

		if ($this->root->isEmpty()) {
			$this->root = $newNode;
		} else {
			$insertLocation = $this->locate($this->root, $value);
			$nodeValue = $insertLocation->value();

			if ($ordering->compare($nodeValue, $value) < 0) {
				$insertLocation->setRight($newNode);
			} else {
				if (!$insertLocation->left()->isEmpty()) {
					$this->predecessor($insertLocation)->setRight($newNode);
				} else {
					$insertLocation->setLeft($newNode);
				}
			}
		}

		$this->count++;
	}

	/**
	 * Get a node that immediately precedes the root
	 * 
	 * @param mixed $root
	 * @return BinaryTree
	 */
	protected function predecessor($root)
	{
		$result = $root->left();

		while (!$result->right()->isEmpty()) {
			$result = $result->right();
		}

		return $result;
	}

	/**
	 * Remove the top most BinaryTree
	 * 
	 * This removes the top binary tree of a tree and returns
	 * the root of the resulting tree (a binary tree rooted with
	 * the predecessor of the top node).
	 * 
	 * @param BinaryTree $topNode: the top most node in the tree
	 * @return BinaryTree
	 */
	public function removeTop($topNode)
	{
		$left = $topNode->left();
		$right = $topNode->right();

		// disconnect top node
		$topNode->setLeft($EMPTY);
		$topNode->setRight($EMPTY);

		// Case A: no left subtree
		// right subtree is new tree
		if ($left->isEmpty()) {
			return $right;
		}

		// Case B: no right subtree
		// left subtree is new tree
		if ($right->isEmpty()) {
			return $left;
		}

		// Case C: left node has no right subtree
		// make right subtree of left
		$predecessor = $left->right();
		if ($predecessor->isEmpty()) {
			$left->setRight($right);
			return $left;
		}

		// General case, slide down left tree
		// successor of root becomes new root
		// parent always points to parent of predecessor
		$parent = $left;
		while ($predecessor->right()->isEmpty()) {
			$parent = $predecessor;
			$predecessor = $predecessor->right();
		}

		$parent->setRight($predecessor->left());
		$predecessor->setLeft($left);
		$predecessor->setRight($right);

		return $predecessor;
	}

	/**
	 * Remove a value from the tree
	 * 
	 * @param mixed $value
	 * @return void
	 */
	public function remove($value)
	{
		if ($this->contains($value)) {
			$this->removeTop($this->locate($this->root, $value));
		}
	}

	/**
	 * Get the iterator
	 * 
	 * This returns the in-order binary tree traversal
	 * iterator.
	 * 
	 * @return Iterator
	 */ 
	public function iterator()
	{
		return $this->root->inorderIterator();
	}
}