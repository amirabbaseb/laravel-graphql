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
//        $brand_query = Brand::query()->where('id', '=', $args['id']);
//        if ($brand_query->exists()){
//            return $brand_query->first();
//        }
//
//        return $brand_query->delete() ? true : false;
        return (new BrandController())->delete($args);
    }
}
