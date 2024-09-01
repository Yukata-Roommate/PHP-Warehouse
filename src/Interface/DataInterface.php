<?php

namespace YukataRm\Warehouse\Interface;

use IteratorAggregate;
use ArrayAccess;
use Serializable;
use Countable;

/**
 * Data Interface
 * 
 * @package YukataRm\Warehouse\Interface
 */
interface DataInterface extends IteratorAggregate, ArrayAccess, Serializable, Countable
{
    /**
     * set data
     * 
     * @param array $data
     * @return void
     */
    public function set(array $data): void;

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * get data
     * 
     * @return array
     */
    public function data(): array;

    /**
     * to array
     * 
     * @return array
     */
    public function toArray(): array;

    /*----------------------------------------*
     * Property - Key
     *----------------------------------------*/

    /**
     * get keys
     * 
     * @return array
     */
    public function keys(): array;

    /**
     * get first key
     * 
     * @return int|string|null
     */
    public function firstKey(): int|string|null;

    /**
     * get last key
     * 
     * @return int|string|null
     */
    public function lastKey(): int|string|null;

    /*----------------------------------------*
     * Property - Value
     *----------------------------------------*/

    /**
     * get values
     * 
     * @return array
     */
    public function values(): array;

    /**
     * get first value
     * 
     * @return mixed
     */
    public function first(): mixed;

    /**
     * get last value
     * 
     * @return mixed
     */
    public function last(): mixed;
}
