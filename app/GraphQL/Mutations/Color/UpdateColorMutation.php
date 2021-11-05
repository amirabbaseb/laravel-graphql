<?php

namespace App\GraphQL\Mutations\Color;

use App\Http\Controllers\ColorController;
use App\Models\Color;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateColorMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateBrand'
    ];

    public function type(): Type
    {
        return GraphQL::type('Color');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
            ],
            'hex_code' => [
                'name' => 'hex_code',
                'type' => Type::string(),
            ]
        ];
    }

    public function resolve($root, $args)
    {
//        $color = Color::query()->where('id', '=', $args['id']);
//        if ($color->exists()) {
//            return $color->first();
//        }
//
////        $color = Color::query()->findOrFail($args['id']);
//        $color->fill($args);
//
//
//        return $color;
        return (new ColorController())->update($args);
    }
}