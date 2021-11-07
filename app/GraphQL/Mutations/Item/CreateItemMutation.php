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
//            'name' => [
//                'name' => 'name',
//                'type' =>  Type::string(),
//            ],
//            'brand_id' => [
//                'name' => 'brand_id',
//                'type' =>  Type::string(),
//            ],
//            'price' => [
//                'name' => 'price',
//                'type' =>  Type::string(),
//            ]
            'input' => [
                'name' => 'input',
                'type' => GraphQL::type('ItemInput')
            ]
        ];
    }

    public function resolve($root, $args)
    {
//        $item = new Item();
//        $item->fill($args);
//        $item->save();
//
//        return $item;
        return (new ItemController())->store($args['input'], ItemRequest::class);
    }
}
