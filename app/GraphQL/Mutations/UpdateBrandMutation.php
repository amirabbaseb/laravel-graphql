<?php

namespace App\graphql\Mutations;

use App\Models\Brand;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateBrandMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateBrand'
    ];

    public function type(): Type
    {
        return GraphQL::type('Brand');
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
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $brand = Brand::query()->findOrFail($args['id']);
        $brand->fill($args);
        $brand->save();

        return $brand;
    }
}
