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
        return Type::string();
    }

    public function args(): array
    {
        return [
            'input' => [
                'name' => 'input',
                'type' => GraphQL::type('ColorInput')
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return (new ColorController())->update($args['input']);
    }
}
