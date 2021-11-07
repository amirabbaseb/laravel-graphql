<?php

namespace App\GraphQL\Mutations\Brand;

use App\Http\Controllers\BrandController;
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
        return Type::string();
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
        return (new BrandController())->store($args);
    }
}
