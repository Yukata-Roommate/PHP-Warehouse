<?php

namespace YukataRm\Warehouse\Proxy;

use YukataRm\Warehouse\Interface\WarehouseInterface;
use YukataRm\Warehouse\Warehouse;
use YukataRm\Warehouse\Interface\DataInterface;
use YukataRm\Warehouse\Data;

/**
 * Proxy Manager
 * 
 * @package YukataRm\Warehouse\Proxy
 */
class Manager
{
    /*----------------------------------------*
     * Warehouse
     *----------------------------------------*/

    /**
     * make Warehouse instance
     *
     * @param array $data
     * @return \YukataRm\Warehouse\Interface\WarehouseInterface
     */
    public function make(array $data): WarehouseInterface
    {
        return new Warehouse($data);
    }

    /**
     * sort data
     * 
     * @param array $data
     * @param callable $callback
     * @return array
     */
    public function sort(array $data, callable $callback): array
    {
        return $this->make($data)->sort($callback)->data();
    }

    /**
     * sort data by key
     * 
     * @param array $data
     * @param callable $callback
     * @return array
     */
    public function sortKey(array $data, callable $callback): array
    {
        return $this->make($data)->sortKey($callback)->data();
    }

    /**
     * filter data
     * 
     * @param array $data
     * @param callable $callback
     * @return array
     */
    public function filter(array $data, callable $callback): array
    {
        return $this->make($data)->filter($callback)->data();
    }

    /**
     * filter data by key
     * 
     * @param array $data
     * @param callable $callback
     * @return array
     */
    public function filterKey(array $data, callable $callback): array
    {
        return $this->make($data)->filterKey($callback)->data();
    }

    /**
     * filter data by value
     * 
     * @param array $data
     * @param callable $callback
     * @return array
     */
    public function filterValue(array $data, callable $callback): array
    {
        return $this->make($data)->filterValue($callback)->data();
    }

    /**
     * shuffle data
     * 
     * @param array $data
     * @return array
     */
    public function shuffle(array $data): array
    {
        return $this->make($data)->shuffle()->data();
    }

    /**
     * shuffle data keep keys association
     * 
     * @param array $data
     * @return array
     */
    public function shuffleAssoc(array $data): array
    {
        return $this->make($data)->shuffleAssoc()->data();
    }

    /**
     * merge data
     * 
     * @param array $data
     * @param array $merged
     * @return array
     */
    public function merge(array $data, array ...$merged): array
    {
        return $this->make($data)->merge(...$merged)->data();
    }

    /**
     * merge data recursive
     * 
     * @param array $data
     * @param array $merged
     * @return array
     */
    public function mergeRecursive(array $data, array ...$merged): array
    {
        return $this->make($data)->mergeRecursive(...$merged)->data();
    }

    /**
     * merge data unique
     * 
     * @param array $data
     * @param array $merged
     * @return array
     */
    public function mergeUnique(array $data, array ...$merged): array
    {
        return $this->make($data)->mergeUnique(...$merged)->data();
    }

    /**
     * merge data unique recursive
     * 
     * @param array $data
     * @param array $merged
     * @return array
     */
    public function mergeUniqueRecursive(array $data, array ...$merged): array
    {
        return $this->make($data)->mergeUniqueRecursive(...$merged)->data();
    }

    /**
     * diff data
     * 
     * @param array $data
     * @param array $diff
     * @return array
     */
    public function diff(array $data, array $diff): array
    {
        return $this->make($data)->diff($diff)->data();
    }

    /**
     * diff data recursive
     * 
     * @param array $data
     * @param array $diff
     * @return array
     */
    public function diffRecursive(array $data, array $diff): array
    {
        return $this->make($data)->diffRecursive($diff)->data();
    }

    /**
     * remove empty value
     * 
     * @param array $data
     * @return array
     */
    public function removeEmpty(array $data): array
    {
        return $this->make($data)->removeEmpty()->data();
    }

    /**
     * remove empty value recursive
     * 
     * @param array $data
     * @return array
     */
    public function removeEmptyRecursive(array $data): array
    {
        return $this->make($data)->removeEmptyRecursive()->data();
    }

    /**
     * masking data
     * 
     * @param array $data
     * @param string|array<string> $target
     * @param string $replace
     * @return array
     */
    public function masking(array $data, string|array $target, string $replace = "*******"): array
    {
        return $this->make($data)->masking($target, $replace)->data();
    }

    /**
     * masking data recursive
     * 
     * @param array $data
     * @param string|array<string> $target
     * @param string $replace
     * @return array
     */
    public function maskingRecursive(array $data, string|array $target, string $replace = "*******"): array
    {
        return $this->make($data)->maskingRecursive($target, $replace)->data();
    }

    /*----------------------------------------*
     * Data
     *----------------------------------------*/

    /**
     * make Data instance
     * 
     * @param array $data
     * @return \YukataRm\Warehouse\Interface\DataInterface
     */
    public function data(array $data): DataInterface
    {
        return new Data($data);
    }

    /**
     * get keys
     * 
     * @param array $data
     * @return array
     */
    public function keys(array $data): array
    {
        return $this->data($data)->keys();
    }

    /**
     * get first key
     * 
     * @param array $data
     * @return int|string|null
     */
    public function firstKey(array $data): int|string|null
    {
        return $this->data($data)->firstKey();
    }

    /**
     * get last key
     * 
     * @param array $data
     * @return int|string|null
     */
    public function lastKey(array $data): int|string|null
    {
        return $this->data($data)->lastKey();
    }

    /**
     * get values
     * 
     * @param array $data
     * @return array
     */
    public function values(array $data): array
    {
        return $this->data($data)->values();
    }

    /**
     * get first value
     * 
     * @param array $data
     * @return mixed
     */
    public function first(array $data): mixed
    {
        return $this->data($data)->first();
    }

    /**
     * get last value
     * 
     * @param array $data
     * @return mixed
     */
    public function last(array $data): mixed
    {
        return $this->data($data)->last();
    }
}
