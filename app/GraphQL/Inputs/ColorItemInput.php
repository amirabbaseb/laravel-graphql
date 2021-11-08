<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class ColorItemInput extends InputType
{
    protected $attributes = [
        'name' => 'ColorItemInput',
        'description' => 'An example input',
    ];

    public function fields(): array
    {
        return [
            'color_id' => [
                'type' => Type::int(),
                'description' => 'A test field',
            ],
            'price' => [
                'type' => Type::string(),
                'description' => 'A test field',
            ]
        ];
    }
}
