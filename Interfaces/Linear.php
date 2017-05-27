<?php

namespace Interfaces;

/**
 * An Interface that lists all methods to be
 * defined by linear data structures.
 *
 * @file    Linear.php
 * @author  Tlotliso Mafantiri
 */
interface Linear
{
	/**
     * All a value to a collection
     *
     * @return void
     */
	public function add();

	/**
     * Get a reference to next object to be removed
     *
     * @return object
     */
	public function get();

	/**
     * Remove an object from a collection
     *
     * @return void
     */
	public function remove();

	/**
     * Get the number of elements in the structure
     *
     * @return integer
     */
	public function size();

	/**
     * Check if the structure is empty
     * 
     * This returns a boolean value of true if
     * and only if the structure is empty
     *
     * @return void
     */
	public function empty();
}