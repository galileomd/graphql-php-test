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
class ItemType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'description' => '',
            'fields' => function() {
                return [
                    'item_id' => [
                        'type' => Types::string(),
                        'description' => ''
                    ],
                    'item_name' => [
                        'type' => Types::string(),
                        'description' => ''
                    ],
                    'item_description' => [
                        'type' => Types::string(),
                        'description' => ''
                    ],
                    'attributes' => [
                        'type' => Types::listOf(Types::attribute()),
                        'description' => '',
                        'resolve' => function ($root) {

                            return DB::select("
                                  SELECT a.*
                                  from item_attribute ia  
                                  JOIN attribute a ON a.attribute_id = ia.fk_attribute_id 
                                  WHERE ia.fk_item_id = {$root->item_id}
                                ");
                        }
                    ]
                ];
            }
        ];
        parent::__construct($config);
    }
}