<?php

namespace App\GraphQL\Mutations\Color;

use App\Http\Controllers\ColorController;
use App\Models\Color;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateColorMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createColor'
    ];

    public function type(): Type
    {
        return GraphQL::type('Color');
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' =>  Type::string(),
            ],
            'hex_code' => [
                'name' => 'hex_code',
                'type' =>  Type::string(),
            ]
        ];
    }

    public function resolve($root, $args)
    {
//        $item = new Color();
//        $item->fill($args);
//        $item->save();
//
//        return $item;
        return (new ColorController())->store($args);
    }
}
