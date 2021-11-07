<?php

namespace App\GraphQL\Mutations\Brand;

use App\Http\Controllers\BrandController;
use App\Models\Brand;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Rebing\GraphQL\Support\Mutation;

class DeleteBrandMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteBrand',
        'description' => 'Delete a brand'
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
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return (new BrandController())->delete($args);
    }
}
