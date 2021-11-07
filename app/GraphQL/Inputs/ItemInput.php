<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class ItemInput extends InputType
{
    protected $attributes = [
        'name' => 'ItemInput',
        'description' => 'An example input',
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'A test field',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'A test field',
            ],
            'price' => [
                'type' => Type::string(),
                'description' => 'A test field',
            ],
            'brand_id' => [
                'type' => Type::int(),
                'description' => 'A test field',
            ],
            'color_input' => [
                'type' => Type::listOf(GraphQL::type('ColorInput'))
            ]
        ];
    }
}
