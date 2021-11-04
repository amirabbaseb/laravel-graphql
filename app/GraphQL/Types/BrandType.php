<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Brand;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;


class BrandType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Brand',
        'description' => 'A type',
        'model' => Brand::class
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
            ]
        ];
    }
}
