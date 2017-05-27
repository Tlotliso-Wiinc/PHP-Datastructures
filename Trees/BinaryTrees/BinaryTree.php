<?php

namespace Trees\BinaryTrees;

use Trees\BinaryTrees\Iterators\BTPreorderIterator;
use Trees\BinaryTrees\Iterators\BTInorderIterator;
use Trees\BinaryTrees\Iterators\BTPostorderIterator;
use Trees\BinaryTrees\Iterators\BTLevelorderIterator;

/**
 * A class that works with Singly Binary Trees.
 *
 * @file    BinaryTree.php
 * @author  Tlotliso Mafantiri
 */
class BinaryTree
{
	/**
	 * @var mixed $value: The value stored in the Node
	 */
	protected $value;

	/**
	 * @var BinaryTree $parent: The parent of the Node
	 */
	protected $parent;

	/**
	 * @var BinaryTree $left: The left child of the Node
	 */
	protected $left;

	/**
	 * @var BinaryTree $right: The right child of the Node
	 */
	protected $right;

	/**
     * Constructor. Initialize the Binary Tree.
     *
     * @param mixed $Value
     * @param BinaryTree $left
     * @param BinaryTree $right
     * @return void
     */
	function __construct($value = null, $left = null, $right = null)
	{
		if ($value != null) {
			$this->value = $value;

			if ($left == null) {
				$left = new BinaryTree();
			}

			$this->setLeft($left);

			if ($right == null) {
				$right = new BinaryTree();
			}

			$this->setRight($right);
		}

		if ($value == null && $left == null && $right == null) {
			$this->value = null;
			$this->left = $this;
			$this->right = $this;
			$this->parent = null;
		}
	}

	/**
	 * Set the reference to the left child
	 * 
	 * @param BinaryTree $left: A left subtree
	 * @return void
	 */ 
	public function setLeft(BinaryTree $left)
	{
		if ($this->isEmpty()) {
			return;
		}

		if ($this->left != null && $this->left->parent() == $this) {
			$this->left->setParent(null);
		}

		$this->left = $left;
		$this->left->setParent($this);
	}

	/**
	 * Set the reference to the right child
	 * 
	 * @param BinaryTree $right: A right subtree
	 * @return void
	 */ 
	public function setRight(BinaryTree $right)
	{
		if ($this->isEmpty()) {
			return;
		}

		if ($this->right != null && $this->right->parent() == $this) {
			$this->right->setParent(null);
		}

		$this->right = $right;
		$this->right->setParent($this);
	}

	/**
	 * Set the reference to the parent
	 * 
	 * @param BinaryTree $parent: The parent Node
	 * @return void
	 */
	protected function setParent($parent)
	{
		if (!$this->isEmpty()) {
			$this->parent = $parent;
		}
	}

	/**
	 * Get the left child
	 * 
	 * @return BinaryTree
	 */
	public function left()
	{
		return $this->left;
	}

	/**
	 * Get the right child
	 * 
	 * @return BinaryTree
	 */
	public function right()
	{
		return $this->right;
	}

	/**
	 * Get the parent Node
	 * 
	 * @return BinaryTree
	 */
	public function parent()
	{
		return $this->parent;
	}

	/**
	 * Get the value stored in the Node
	 * 
	 * @return mixed
	 */
	public function value()
	{
		return $this->value;
	}

	/**
	 * Set the value associated with this Node
	 * 
	 * @param mixed $value: The new Value
	 * @return $void
	 */
	public function setValue($value)
	{
		$this->value = $value;
	}

	/**
	 * Get the preorder traversal iterator
	 * 
	 * @return BTPreorderIterator
	 */
	public function preorderIterator()
	{
		return new BTPreorderIterator($this);
	}

	/**
	 * Get the in-order traversal iterator
	 * 
	 * @return BTInorderIterator
	 */
	public function inorderIterator()
	{
		return new BTInorderIterator($this);
	}

	/**
	 * Get the postorder traversal iterator
	 * 
	 * @return BTPostorderIterator
	 */
	public function postorderIterator()
	{
		return new BTPostorderIterator($this);
	}

	/**
	 * Get the level-order traversal iterator
	 * 
	 * @return BTLevelorderIterator
	 */
	public function levelorderIterator()
	{
		return new BTLevelorderIterator($this);
	}

	/**
	 * Check if the Binary Tree is empty
	 * 
	 * @return boolean
	 */
	public function isEmpty()
	{
		return $this->value == null;
	}

	/**
	 * Get the root of the tree
	 * 
	 * @return BinaryTree
	 */
	public function root()
	{
		if ($this->parent() == null) {
			return $this;
		}

		return $this->parent()->root();
	}

	/**
	 * Get the depth of a Node in a tree
	 * 
	 * This is the number of edges from a
	 * Node to the root.
	 * 
	 * @return integer
	 */
	public function depth()
	{
		if ($this->parent() == null) {
			return 0;
		}

		return 1 + $this->parent->depth();
	}

	/**
	 * Get the largest number between two numbers
	 * 
	 * @return integer
	 */ 
	private function max($left, $right)
	{
		if ($left >= $right) {
			return $left;
		}

		return $right;
	}

	/**
	 * The height of a Node in its tree
	 * 
	 * @return integer
	 */ 
	public function height()
	{
		if ($this->isEmpty) {
			return -1;
		}

		return 1 + $this->max($this->left()->height(), $this->right()->height());
	}

	/**
	 * Check if the tree is full
	 * 
	 * @return boolean
	 */ 
	public function isFull()
	{
		$h = $this->height();
		$s = $this->size();
	}

	/**
     * Get the size (number of nodes) in the tree
     *
     * @return integer
     */
	public function size()
	{
		if ($this->isEmpty()) {
			return 0;
		}

		return $this->left()->size() + $this->right()->size() + 1;
	}

	/**
	 * Remove all elements from the tree
	 * 
	 * @return void
	 */
	public function clear()
	{
		$this->setValue(null);
		$this->setParent(null);
		$this->setLeft(null);
		$this->setRight(null);
	}
}