<?php

namespace App\GraphQL\Mutations;

use App\Models\Brand;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateBrandMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createBrand'
    ];

    public function type(): Type
    {
        return GraphQL::type('Brand');
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' =>  Type::string(),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $item = new Brand();
        $item->fill($args);
        $item->save();

        return $item;
    }
}
