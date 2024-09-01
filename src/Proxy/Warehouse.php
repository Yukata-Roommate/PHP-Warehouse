<?php

namespace YukataRm\Warehouse\Proxy;

use YukataRm\StaticProxy\StaticProxy;

use YukataRm\Warehouse\Proxy\Manager;

/**
 * Warehouse Proxy
 * 
 * @package YukataRm\Warehouse\Proxy
 * 
 * @method static \YukataRm\Warehouse\Interface\WarehouseInterface make(array $data)
 * @method static array sort(array $data, callable $callback)
 * @method static array sortKey(array $data, callable $callback)
 * @method static array filter(array $data, callable $callback)
 * @method static array filterKey(array $data, callable $callback)
 * @method static array filterValue(array $data, callable $callback)
 * @method static array shuffle(array $data)
 * @method static array shuffleAssoc(array $data)
 * @method static array merge(array $data, array ...$merged)
 * @method static array mergeRecursive(array $data, array ...$merged)
 * @method static array mergeUnique(array $data, array ...$merged)
 * @method static array mergeUniqueRecursive(array $data, array ...$merged)
 * @method static array diff(array $data, array $diff)
 * @method static array diffRecursive(array $data, array $diff)
 * @method static array removeEmpty(array $data)
 * @method static array removeEmptyRecursive(array $data)
 * @method static array masking(array $data, string|array<string> $target, string $replace = "*******")
 * @method static array maskingRecursive(array $data, string|array<string> $target, string $replace = "*******")
 * 
 * @method static \YukataRm\Warehouse\Interface\DataInterface data(array $data)
 * @method static array keys(array $data)
 * @method static int|string|null firstKey(array $data)
 * @method static int|string|null lastKey(array $data)
 * @method static array values(array $data)
 * @method static array first(array $data)
 * @method static array last(array $data)
 * 
 * @see \YukataRm\Warehouse\Proxy\Manager
 */
class Warehouse extends StaticProxy
{
    /** 
     * get class name calling dynamic method
     * 
     * @return string 
     */
    protected static function getCallableClassName(): string
    {
        return Manager::class;
    }
}
