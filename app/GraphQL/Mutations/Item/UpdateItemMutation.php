<?php

namespace App\GraphQL\Mutations\Item;

use App\Http\Controllers\ItemController;
use App\Models\Item;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateItemMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateItem'
    ];

    public function type(): Type
    {
        return Type::string();
    }

    public function args(): array
    {
        return [
            'input' => [
                'name' => 'input',
                'type' => GraphQL::type('ItemInput')
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return (new ItemController())->update($args['input']);
    }
}
