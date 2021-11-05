<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class BrandInput extends InputType
{
    protected $attributes = [
        'name' => 'BrandInput',
        'description' => 'An example input',
    ];

    public function fields(): array
    {
        return [
            'name' => [
                'type' => Type::string(),
                'description' => 'A test field',
            ],
        ];
    }
}
