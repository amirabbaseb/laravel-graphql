<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class ColorInput extends InputType
{
    protected $attributes = [
        'name' => 'ColorInput',
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
            'hex_code' => [
                'type' => Type::string(),
                'description' => 'A test field',
            ],
        ];
    }
}
