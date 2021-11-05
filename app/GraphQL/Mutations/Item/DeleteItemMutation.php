<?php

namespace App\graphql\Mutations\Item;

use App\Http\Controllers\ItemController;
use App\Models\Item;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteItemMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteItem',
        'description' => 'Delete a Item'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }


    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
//        $item = Item::query()->findOrFail($args['id']);
//        return $item->delete() ? true : false;

        return (new ItemController())->delete($args);
    }
}
