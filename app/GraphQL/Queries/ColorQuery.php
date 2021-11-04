<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Color;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\SelectFields;

class ColorQuery extends Query
{
    protected $attributes = [
        'name' => 'color',
        'description' => 'A query'
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
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Color::findOrFail($args['id']);
    }
}
