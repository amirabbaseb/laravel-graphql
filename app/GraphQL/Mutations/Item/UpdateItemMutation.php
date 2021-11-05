<?php

namespace App\graphql\Mutations\Item;

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
        return GraphQL::type('Item');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' =>  Type::int(),
            ],
            'name' => [
                'name' => 'name',
                'type' =>  Type::string(),
            ],
            'brand_id' => [
                'name' => 'brand_id',
                'type' =>  Type::string(),
            ],
        ];
    }

    public function resolve($root, $args)
    {
//        $item = Item::query()->findOrFail($args['id']);
//        $item->fill($args);
//        $item->save();
//
//        return $item;
        return (new ItemController())->update($args);

    }
}
