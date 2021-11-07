<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\ItemColor;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    private function validator($args)
    {
        $rules = [
            'name' => ['required'],
            'brand_id' => ['required']
        ];

        $this->general_validation($rules, $args);
    }

    public function store($args)
    {
        $this->validator($args);

        $item_query = Item::query()->create($args);

        foreach ($args['color_input'] as $key => $value) {
            $add_to_itemColor = ItemColor::query()->create($args['color_input']);
        }

        return "created";
    }

    public function update($args)
    {
        $this->validator($args);

        $item_query = Item::query()->find($args['id']);
        $item_query->update($args);

        return "updated";
    }

    public function delete($args)
    {
        $rules = [
            'id' => ['required'],
        ];

        $this->general_validation($rules, $args);

        $item_query = Item::query()->find($args['id']);
        $item_query->delete($args);

        return "deleted";
    }
}
