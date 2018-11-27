<?php

namespace App;

use App\Type\AttributeType;
use App\Type\ItemType;
use App\Type\QueryType;
use GraphQL\Type\Definition\Type;

/**
 * Class Types
 *
 * Реестр и фабрика типов для GraphQL
 *
 * @package App
 */
class Types
{
    private static $query;
    private static $item;
    private static $attribute;

    public static function query()
    {
        return self::$query ?: (self::$query = new QueryType());
    }

    public static function item()
    {
        return self::$item ?: (self::$item = new ItemType());
    }

    public static function attribute()
    {
        return self::$attribute ?: (self::$attribute = new AttributeType());
    }

    /**
     * @return \GraphQL\Type\Definition\IntType
     */
    public static function int()
    {
        return Type::int();
    }

    /**
     * @return \GraphQL\Type\Definition\StringType
     */
    public static function string()
    {
        return Type::string();
    }

    /**
     * @param \GraphQL\Type\Definition\Type $type
     * @return \GraphQL\Type\Definition\ListOfType
     */
    public static function listOf($type)
    {
        return Type::listOf($type);
    }
}