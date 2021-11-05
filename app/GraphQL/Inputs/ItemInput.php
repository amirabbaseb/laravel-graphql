<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

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
            'name' => [
                'type' => Type::string(),
                'description' => 'A test field',
                'alias' => 'name',
            ],
            'price' => [
                'type' => Type::string(),
                'description' => 'A test field',
                'alias' => 'price',
            ],
            'brand' => [
                'type' => Type::string(),
                'description' => 'A test field',
                'alias' => 'brand_id'
            ]
        ];
    }
}
