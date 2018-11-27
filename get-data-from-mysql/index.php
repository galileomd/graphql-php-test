<?php

require_once __DIR__ . '/vendor/autoload.php';

ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED & ~E_WARNING);

use App\DB;
use App\Types;
use GraphQL\GraphQL;
use GraphQL\Schema;

try {
    $config = [
        'host' => 'localhost',
        'database' => 'gql_test',
        'username' => 'root',
        'password' => 'root'
    ];

    DB::init($config);

    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);
    $query = $input['query'];

    $schema = new Schema([
        'query' => Types::query()
    ]);

    $result = GraphQL::execute($schema, $query);
} catch (\Exception $e) {
    $result = [
        'error' => [
            'message' => $e->getMessage()
        ]
    ];
}

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($result);
