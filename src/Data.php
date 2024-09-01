<?php

namespace YukataRm\Warehouse;

use YukataRm\Warehouse\Interface\DataInterface;

/**
 * Data
 * 
 * @package YukataRm\Warehouse
 */
class Data implements DataInterface
{
    /**
     * data
     * 
     * @var array
     */
    protected array $data;

    /**
     * constructor
     * 
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->set($data);
    }

    /**
     * set data
     * 
     * @param array $data
     * @return void
     */
    public function set(array $data): void
    {
        $this->data = $data;
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * get data
     * 
     * @return array
     */
    public function data(): array
    {
        return $this->data;
    }

    /**
     * to array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return $this->data();
    }

    /*----------------------------------------*
     * Property - Key
     *----------------------------------------*/

    /**
     * get keys
     * 
     * @return array
     */
    public function keys(): array
    {
        return array_keys($this->data);
    }

    /**
     * get first key
     * 
     * @return int|string|null
     */
    public function firstKey(): int|string|null
    {
        return array_key_first($this->data);
    }

    /**
     * get last key
     * 
     * @return int|string|null
     */
    public function lastKey(): int|string|null
    {
        return array_key_last($this->data);
    }

    /*----------------------------------------*
     * Property - Value
     *----------------------------------------*/

    /**
     * get values
     * 
     * @return array
     */
    public function values(): array
    {
        return array_values($this->data);
    }

    /**
     * get first value
     * 
     * @return mixed
     */
    public function first(): mixed
    {
        return reset($this->values()) ?: null;
    }

    /**
     * get last value
     * 
     * @return mixed
     */
    public function last(): mixed
    {
        return end($this->values()) ?: null;
    }

    /*----------------------------------------*
     * IteratorAggregate
     *----------------------------------------*/

    /**
     * get iterator
     * 
     * @return \Traversable
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->data);
    }

    /*----------------------------------------*
     * ArrayAccess
     *----------------------------------------*/

    /**
     * offset exists
     * 
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->data[$offset]);
    }

    /**
     * offset get
     * 
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset): mixed
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }

    /**
     * offset set
     * 
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    /**
     * offset unset
     * 
     * @param mixed $offset
     */
    public function offsetUnset($offset): void
    {
        unset($this->data[$offset]);
    }

    /*----------------------------------------*
     * Serializable
     *----------------------------------------*/

    /**
     * serialize
     * 
     * @return string
     */
    public function serialize(): string
    {
        return serialize($this->data);
    }

    /**
     * unserialize
     * 
     * @param string $serialized
     */
    public function unserialize($serialized): void
    {
        $this->data = unserialize($serialized);
    }

    /*----------------------------------------*
     * Countable
     *----------------------------------------*/

    /**
     * count
     * 
     * @return int
     */
    public function count(): int
    {
        return count($this->data);
    }
}
