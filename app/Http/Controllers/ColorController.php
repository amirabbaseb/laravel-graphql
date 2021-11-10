<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function store($args)
    {
        $rules = [
            'name' => ['required', 'unique:colors,name'],
            'hex_code' => ['required', 'unique:colors,hex_code'],
        ];

        $this->general_validation($rules, $args);

        $color_query = Color::query()->create($args);

        return 'created';
    }

    public function update($args)
    {
        $rules = [
            'name' => ['unique:colors,name'],
            'hex_code' => ['unique:colors,hex_code'],
            'id' => ['required|exits:colors,id']
        ];

        $this->general_validation($rules, $args);

        $color_query = Color::query()->find($args['id']);
        $color_query->update($args);

        return "updated";
    }

    public function delete($args)
    {
        $rules = [
            'id' => ['required|exits:colors,id']
        ];

        $this->general_validation($rules, $args);

        $color_query = Color::query()->find($args['id']);
        $color_query->delete();

        return "deleted";
    }
}
