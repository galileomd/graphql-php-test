<?php

namespace App\Type;

use App\DB;
use App\Types;
use GraphQL\Type\Definition\ObjectType;

class QueryType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function() {
                return [
                    'item' => [
                        'type' => Types::item(),
                        'description' => 'Возвращает пользователя по id',
                        'args' => [
                            'id' => Types::int()
                        ],
                        'resolve' => function ($root, $args) {
                            return DB::selectOne("SELECT * from item");
                        }
                    ],
                    'attributes' => [
                        'type' => Types::listOf(Types::attribute()),
                        'description' => 'Список пользователей',
                        'resolve' => function () {
                            return DB::select('SELECT * from attribute');
                        }
                    ]
                ];
            }
        ];
        parent::__construct($config);
    }
}