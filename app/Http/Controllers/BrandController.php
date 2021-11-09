<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    private function validator($args) {
        $rules = [
            'name' => ['required', 'unique:brands,name'],
        ];

        $this->general_validation($rules, $args);
    }

    public function store($args)
    {
        $this->validator($args);

        $brand_query = Brand::query()->create($args);

        return "created";
    }

    public function update($args)
    {
        $this->validator($args);

        $brand_query = Brand::query()->find($args['id']);
        $brand_query->update($args);

        return "updated";
    }

    public function delete($args)
    {
        $rules = [
            'id' => ['required'],
        ];

        $this->general_validation($rules, $args);

        $brand_query = Brand::query()->find($args['id']);
        $brand_query->delete();

        return "deleted";
    }
}
