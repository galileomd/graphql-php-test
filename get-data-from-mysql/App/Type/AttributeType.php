<?php

namespace App\Type;

use App\DB;
use App\Types;
use GraphQL\Type\Definition\ObjectType;

/**
 * Class ItemType
 * *
 * @package App\Type
 */
class AttributeType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'description' => '',
            'fields' => function() {
                return [
                    'attribute_id' => [
                        'type' => Types::string(),
                        'description' => ''
                    ],
                    'attribute_name' => [
                        'type' => Types::string(),
                        'description' => ''
                    ],
                    'attribute_description' => [
                        'type' => Types::string(),
                        'description' => ''
                    ]
                ];
            }
        ];
        parent::__construct($config);
    }
}