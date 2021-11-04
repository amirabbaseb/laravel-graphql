<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Item;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;


class ItemType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Item',
        'description' => 'A item',
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'Id of the item',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the item',
            ],
            'brand_id' => [
                'type' => Type::string(),
                'description' => 'The brand name of the item',
            ],
        ];
    }
}
