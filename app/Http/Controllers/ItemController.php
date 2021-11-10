<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\ColorItem;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function store($args)
    {
        $rules = [
            'name' => ['required'],
            'brand_id' => ['required', 'exists:brands,id'],
        ];

        $this->general_validation($rules, $args);

        $item_query = Item::query()->create($args);

        $find_item_byID = Item::query()->where([
            ['name', '=', $args['name']]
        ])->get();

        if ($find_item_byID->count() < 0) {
            exit();
        }

        foreach ($args['color_input'] as $key => $value) {
            $add_to_itemColor = ColorItem::query()->create([
                'item_id' => $find_item_byID[0]['id'],
                'color_id' => $value['color_id'],
                'price' => $value['price']
            ]);
        }

        return "created";
    }

    public function update($args)
    {
        $rules = [
            'name' => ['required'],
            'brand_id' => ['required', 'exists:brands,id'],
            'id' => ['required|exits:items,id']
        ];

        $this->general_validation($rules, $args);

        $item_query = Item::query()->find($args['id']);
        $item_query->update($args);

        return "updated";
    }

    public function delete($args)
    {
        $rules = [
            'id' => ['required|exits:items,id']
        ];

        $this->general_validation($rules, $args);

        $item_query = Item::query()->find($args['id']);
        $item_query->delete($args);

        return "deleted";
    }
}
