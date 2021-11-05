<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function store($args) {
        $item = new Color();
        $item->fill($args);
        $item->save();

        return $item;
    }

    public function update($args)
    {
        $color_quey = Color::query()->where('id', '=', $args['id']);
        if ($color_quey->exists()){
            return $color_quey->first();
        }

        $color_quey->fill($args);
        $color_quey->save();

        return $color_quey;
    }

    public function delete($args)
    {
        $color_quey = Color::query()->where('id', '=', $args['id']);
        if ($color_quey->exists()) {
            return $color_quey->first();
        }

        return $color_quey->delete() ? true : false;
    }
}
