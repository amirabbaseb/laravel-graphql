<?php

namespace App\GraphQL\Mutations\Item;

use App\Http\Controllers\ItemController;
use App\Models\Item;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;


class DeleteItemMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteItem',
        'description' => 'Delete a Item'
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
        return (new ItemController())->delete($args['input']);
    }
}
