<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Brand;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\SelectFields;

class BrandQuery extends Query
{
    protected $attributes = [
        'name' => 'brand',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type('Brand');
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
        return Brand::findOrFail($args['id']);
    }
}
