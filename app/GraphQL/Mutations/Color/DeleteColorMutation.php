<?php

namespace App\graphql\Mutations\Color;

use App\Http\Controllers\ColorController;
use App\Models\Color;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteColorMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteColor',
        'description' => 'Delete a color'
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
//        $color = Color::query()->findOrFail($args['id']);
//
//        return $color->delete() ? true : false;
        return (new ColorController())->delete($args);
    }
}
