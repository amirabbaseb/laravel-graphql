<?php

namespace App\GraphQL\Mutations\Color;

use App\Http\Controllers\ColorController;
use App\Models\Color;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class DeleteColorMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteColor',
        'description' => 'Delete a color'
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
        return (new ColorController())->delete($args['input']);
    }
}
