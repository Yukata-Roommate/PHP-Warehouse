<?php

namespace YukataRm\Warehouse;

use YukataRm\Warehouse\Interface\WarehouseInterface;
use YukataRm\Warehouse\Data;

/**
 * Warehouse
 * 
 * @package YukataRm\Warehouse
 */
class Warehouse extends Data implements WarehouseInterface
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
    public function sort(callable $callback): static
    {
        $tmp = $this->data;

        usort($tmp, $callback);

        $this->data = $tmp;

        return $this;
    }

    /**
     * sort data by key
     * 
     * @param callable $callback
     * @return static
     */
    public function sortKey(callable $callback): static
    {
        $tmp = $this->data;

        uksort($tmp, $callback);

        $this->data = $tmp;

        return $this;
    }

    /*----------------------------------------*
     * Filter
     *----------------------------------------*/

    /**
     * filter data
     * 
     * @param callable $callback
     * @return static
     */
    public function filter(callable $callback): static
    {
        $tmp = [];

        foreach ($this->data as $key => $value) {
            if ($callback($key, $value)) $tmp[$key] = $value;
        }

        $this->data = $tmp;

        return $this;
    }

    /**
     * filter data by key
     * 
     * @param callable $callback
     * @return static
     */
    public function filterKey(callable $callback): static
    {
        $tmp = [];

        foreach ($this->data as $key => $value) {
            if ($callback($key)) $tmp[$key] = $value;
        }

        $this->data = $tmp;

        return $this;
    }

    /**
     * filter data by value
     * 
     * @param callable $callback
     * @return static
     */
    public function filterValue(callable $callback): static
    {
        $tmp = [];

        foreach ($this->data as $key => $value) {
            if ($callback($value)) $tmp[$key] = $value;
        }

        $this->data = $tmp;

        return $this;
    }

    /*----------------------------------------*
     * Shuffle
     *----------------------------------------*/

    /**
     * shuffle data
     * 
     * @return static
     */
    public function shuffle(): static
    {
        $keys = $this->keys();

        shuffle($keys);

        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = $this->data[$key];
        }

        $this->data = $tmp;

        return $this;
    }

    /**
     * shuffle data keep keys association
     * 
     * @return static
     */
    public function shuffleAssoc(): static
    {
        $keys = $this->keys();

        shuffle($keys);

        $tmp = [];
        foreach ($keys as $key) {
            $tmp[$key] = $this->data[$key];
        }

        $this->data = $tmp;

        return $this;
    }

    /*----------------------------------------*
     * Merge
     *----------------------------------------*/

    /**
     * merge data
     * 
     * @param array $merged
     * @return static
     */
    public function merge(array ...$merged): static
    {
        $tmp = $this->data;

        foreach ($merged as $item) {
            $tmp = array_merge($tmp, $item);
        }

        $this->data = $tmp;

        return $this;
    }

    /**
     * merge data recursive
     * 
     * @param array $merged
     * @return static
     */
    public function mergeRecursive(array ...$merged): static
    {
        $tmp = $this->data;

        foreach ($merged as $item) {
            $tmp = array_merge_recursive($tmp, $item);
        }

        $this->data = $tmp;

        return $this;
    }

    /**
     * merge data unique
     * 
     * @param array $merged
     * @return static
     */
    public function mergeUnique(array ...$merged): static
    {
        $tmp = $this->data;

        foreach ($merged as $item) {
            $tmp = array_merge($tmp, $item);

            $tmp = array_unique($tmp);

            $tmp = array_values($tmp);
        }

        $this->data = $tmp;

        return $this;
    }

    /**
     * merge data unique recursive
     * 
     * @param array $merged
     * @return static
     */
    public function mergeUniqueRecursive(array ...$merged): static
    {
        $tmp = $this->data;

        foreach ($merged as $item) {
            $tmp = array_merge_recursive($tmp, $item);

            $tmp = array_map("unserialize", array_unique(array_map("serialize", $tmp)));
        }

        $this->data = $tmp;

        return $this;
    }

    /*----------------------------------------*
     * Diff
     *----------------------------------------*/

    /**
     * diff data
     * 
     * @param array $diff
     * @return static
     */
    public function diff(array $diff): static
    {
        $tmp = array_diff($this->data, $diff);

        $this->data = $tmp;

        return $this;
    }

    /**
     * diff data recursive
     * 
     * @param array $diff
     * @return static
     */
    public function diffRecursive(array $diff): static
    {
        foreach ($diff as $key => $value) {
            if (is_array($value)) {
                $this->data[$key] = (new static($this->data[$key]))->diffRecursive($value)->data();
            } else {
                if (in_array($value, $this->data)) unset($this->data[$key]);
            }
        }

        return $this;
    }

    /*----------------------------------------*
     * Remove
     *----------------------------------------*/

    /**
     * remove data
     * 
     * @param string|array<string> $target
     * @return static
     */
    public function remove(string|array $target): static
    {
        if (is_string($target)) $target = [$target];

        $tmp = [];

        foreach ($this->data as $key => $value) {
            if (in_array($key, $target)) continue;

            $tmp[$key] = $value;
        }

        $this->data = $tmp;

        return $this;
    }

    /**
     * remove data recursive
     * 
     * @param string|array<string> $target
     * @return static
     */
    public function removeRecursive(string|array $target): static
    {
        if (is_string($target)) $target = [$target];

        $tmp = [];

        foreach ($this->data as $key => $value) {
            if (is_array($value)) $value = (new static($value))->removeRecursive($target)->data();

            if (in_array($key, $target)) continue;

            $tmp[$key] = $value;
        }

        $this->data = $tmp;

        return $this;
    }

    /**
     * remove empty value
     * 
     * @return static
     */
    public function removeEmpty(): static
    {
        $tmp = [];

        foreach ($this->data as $key => $value) {
            if (empty($value)) continue;

            $tmp[$key] = $value;
        }

        $this->data = $tmp;

        return $this;
    }

    /**
     * remove empty value recursive
     * 
     * @return static
     */
    public function removeEmptyRecursive(): static
    {
        $tmp = [];

        foreach ($this->data as $key => $value) {
            if (is_array($value)) $value = (new static($value))->removeEmptyRecursive()->data();

            if (empty($value)) continue;

            $tmp[$key] = $value;
        }

        $this->data = $tmp;

        return $this;
    }

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
    public function masking(string|array $target, string $replace = "*******"): static
    {
        if (is_string($target)) $target = [$target];

        $tmp = [];

        foreach ($this->data as $key => $value) {
            if (in_array($key, $target)) $value = $replace;

            $tmp[$key] = $value;
        }

        $this->data = $tmp;

        return $this;
    }

    /**
     * masking data recursive
     * 
     * @param string|array<string> $target
     * @param string $replace
     * @return static
     */
    public function maskingRecursive(string|array $target, string $replace = "*******"): static
    {
        if (is_string($target)) $target = [$target];

        $tmp = [];

        foreach ($this->data as $key => $value) {
            if (is_array($value)) $value = (new static($value))->maskingRecursive($target, $replace)->data();

            if (in_array($key, $target)) $value = $replace;

            $tmp[$key] = $value;
        }

        $this->data = $tmp;

        return $this;
    }
}
