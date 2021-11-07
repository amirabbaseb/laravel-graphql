<?php

namespace App\GraphQL\Mutations\Brand;

use App\Http\Controllers\BrandController;
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
        return Type::string();
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
        return (new BrandController())->update($args);
    }
}
