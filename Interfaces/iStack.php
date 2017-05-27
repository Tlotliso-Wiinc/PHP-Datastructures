<?php

namespace Interfaces;
use Interfaces\Linear;

/**
 * An Interface that lists all methods to be
 * defined by a stack.
 *
 * @file    iStack.php
 * @author  Tlotliso Mafantiri
 */
 interface iStack extends Linear
 {
 	/**
     * Add an item to a stack
     *
     * @param mixed $item
     * @return void
     */
	public function add($item);

	/**
     * Add an item to a stack
     *
     * @param mixed $item
     * @return void
     */
	public function push($item);

	/**
     * Remove an item from a stack
     * 
     * The most recently added item is removed
     * and returned
     *
     * @return void
     */
	public function remove();

	/**
     * Remove an item from a stack
     * 
     * The most recently added item is removed
     * and returned
     *
     * @return void
     */
	public function pop();

	/**
     * Get the top value (the next to be popped or removed)
     *
     * @return mixed
     */
	public function get();

	/**
     * Get the top value (the next to be popped or removed)
     *
     * @return mixed
     */
	public function getFirst();

	/**
     * Get the top value (the next to be popped or removed)
     *
     * @return mixed
     */
	public function peek();

	/**
     * Get the number of elements in the stack
     *
     * @return integer
     */
	public function size();

	/**
     * Check if the stack is empty
     * 
     * This returns a boolean value of true if
     * and only if the stack is empty
     *
     * @return boolean
     */
	public function empty();
 }