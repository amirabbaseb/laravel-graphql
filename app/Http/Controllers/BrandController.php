<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function store($args)
    {
        $item = new Brand();
        $item->fill($args);
        $item->save();

        return $item;
    }

    public function update($args)
    {
        $brand_query = Brand::query()->where('id', '=', $args['id']);
        if ($brand_query->exists()){
            return $brand_query->first();
        }

        $brand_query->fill($args);
        $brand_query->save();

        return $brand_query;
    }

    public function delete($args)
    {
        $brand_query = Brand::query()->where('id', '=', $args['id']);
        if ($brand_query->exists()) {
            return $brand_query->first();
        }

        return $brand_query->delete() ? true : false;
    }
}
