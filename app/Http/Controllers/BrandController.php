<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function store($args)
    {
        $rules = [
            'name' => ['required', 'unique:brands,name'],
        ];

        $this->general_validation($rules, $args);

        $brand_query = Brand::query()->create($args);

        return "created";
    }

    public function update($args)
    {
        $rules = [
            'name' => ['unique:brands,name'],
            'id' => ['required|exits:brands,id']
        ];

        $this->general_validation($rules, $args);
        $brand_query = Brand::query()->find($args['id']);
        $brand_query->update($args);

        return "updated";
    }

    public function delete($args)
    {
        $rules = [
            'id' => ['required|exits:brands,id']
        ];

        $this->general_validation($rules, $args);

        $brand_query = Brand::query()->find($args['id']);
        $brand_query->delete();

        return "deleted";
    }
}
