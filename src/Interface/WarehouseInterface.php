<?php

namespace YukataRm\Warehouse\Interface;

use YukataRm\Warehouse\Interface\DataInterface;

/**
 * Warehouse Interface
 * 
 * @package YukataRm\Warehouse\Interface
 */
interface WarehouseInterface extends DataInterface
{
    /*----------------------------------------*
     * Sort
     *----------------------------------------*/

    /**
     * sort data
     * 
     * @param callable $callback
     * @return static
     */
    public function sort(callable $callback): static;

    /**
     * sort data by key
     * 
     * @param callable $callback
     * @return static
     */
    public function sortKey(callable $callback): static;

    /*----------------------------------------*
     * Filter
     *----------------------------------------*/

    /**
     * filter data
     * 
     * @param callable $callback
     * @return static
     */
    public function filter(callable $callback): static;

    /**
     * filter data by key
     * 
     * @param callable $callback
     * @return static
     */
    public function filterKey(callable $callback): static;

    /**
     * filter data by value
     * 
     * @param callable $callback
     * @return static
     */
    public function filterValue(callable $callback): static;

    /*----------------------------------------*
     * Shuffle
     *----------------------------------------*/

    /**
     * shuffle data
     * 
     * @return static
     */
    public function shuffle(): static;

    /**
     * shuffle data keep keys association
     * 
     * @return static
     */
    public function shuffleAssoc(): static;

    /*----------------------------------------*
     * Merge
     *----------------------------------------*/

    /**
     * merge data
     * 
     * @param array $merged
     * @return static
     */
    public function merge(array ...$merged): static;

    /**
     * merge data recursive
     * 
     * @param array $merged
     * @return static
     */
    public function mergeRecursive(array ...$merged): static;

    /**
     * merge data unique
     * 
     * @param array $merged
     * @return static
     */
    public function mergeUnique(array ...$merged): static;

    /**
     * merge data unique recursive
     * 
     * @param array $merged
     * @return static
     */
    public function mergeUniqueRecursive(array ...$merged): static;

    /*----------------------------------------*
     * Diff
     *----------------------------------------*/

    /**
     * diff data
     * 
     * @param array $diff
     * @return static
     */
    public function diff(array $diff): static;

    /**
     * diff data recursive
     * 
     * @param array $diff
     * @return static
     */
    public function diffRecursive(array $diff): static;

    /*----------------------------------------*
     * Remove
     *----------------------------------------*/

    /**
     * remove empty value
     * 
     * @return static
     */
    public function removeEmpty(): static;

    /**
     * remove empty value recursive
     * 
     * @return static
     */
    public function removeEmptyRecursive(): static;

    /*----------------------------------------*
     * Masking
     *----------------------------------------*/

    /**
     * masking data
     * 
     * @param string|array<string> $target
     * @param string $replace
     * @return static
     */
    public function masking(string|array $target, string $replace = "*******"): static;

    /**
     * masking data recursive
     * 
     * @param string|array<string> $target
     * @param string $replace
     * @return static
     */
    public function maskingRecursive(string|array $target, string $replace = "*******"): static;
}
