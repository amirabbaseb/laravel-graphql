<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    private function validator($args)
    {
        $rules = [
            'name' => ['required', 'unique:colors,name'],
            'hex_code' => ['required', 'unique:colors,hex_code'],
            'id' => ['numeric']
        ];

        $this->general_validation($rules, $args);
    }

    public function store($args)
    {
        $this->validator($args);

        $color_query = Color::query()->create($args);

        return 'created';
    }

    public function update($args)
    {
        $this->validator($args);

        $color_query = Color::query()->find($args['id']);
        $color_query->update($args);

        return "updated";
    }

    public function delete($args)
    {
        $rules = [
            'id' => ['required'],
        ];

        $this->general_validation($rules, $args);

        $color_query = Color::query()->find($args['id']);
        $color_query->delete();

        return "deleted";
    }
}
