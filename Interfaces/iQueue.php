<?php

namespace Interfaces;
use Interfaces\Linear;

/**
 * An Interface that lists all methods to be
 * defined by a queue.
 *
 * @file    iQueue.php
 * @author  Tlotliso Mafantiri
 */
 interface iQueue extends Linear
 {
 	/**
     * Add an item to a queue
     *
     * @param mixed $item
     * @return void
     */
	public function add($item);

	/**
     * Add an item to a queue
     *
     * @param mixed $item
     * @return void
     */
	public function enqueue($item);

	/**
     * Remove an item from a queue
     * 
     * The head of the queue is removed
     * and returned
     *
     * @return void
     */
	public function remove();

	/**
     * Remove an item from a queue
     * 
     * The head of the queue is removed
     * and returned
     *
     * @return void
     */
	public function dequeue();

	/**
	 * Get the first element
	 * 
	 * The element at the head of the queue 
	 * is returned
	 * 
	 * @return mixed
	 */
	public function get();

	/**
	 * Get the first element
	 * 
	 * The element at the head of the queue 
	 * is returned
	 * 
	 * @return mixed
	 */
	public function getFirst();

	/**
	 * Get the first element
	 * 
	 * The element at the head of the queue 
	 * is returned
	 * 
	 * @return mixed
	 */
	public function peek();

	/**
     * Get the number of elements in the queue
     *
     * @return integer
     */
	public function size();

	/**
     * Check if the queue is empty
     * 
     * This returns a boolean value of true if
     * and only if the queue is empty
     *
     * @return boolean
     */
	public function empty();
 }