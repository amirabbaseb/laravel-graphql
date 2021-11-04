<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Color;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;


class ColorType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Color',
        'description' => 'A type',
        'model' => Color::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'Id of the color',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the color',
            ],
            'hex_code' => [
                'type' => Type::string(),
                'description' => 'Hex_code of the color',
            ],
        ];
    }
}
