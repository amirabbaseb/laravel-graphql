<?php

namespace App\GraphQL\Mutations\Item;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Http\Controllers\ItemController;

class CreateItemMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createItem'
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
        return (new ItemController())->store($args['input'], ItemRequest::class);
    }
}
