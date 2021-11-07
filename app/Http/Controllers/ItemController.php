<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function store($args)
    {
        $rules = [
          'name' => ['required'],
          'brand_id' => ['required']
        ];

        $this->general_validation($rules, $args);

        $item = new Item();
        $item->fill($args);
        $item->save();

        return "created";
    }

    public function update($args)
    {
        $item_query = Item::query()->where('id', '=', $args['id']);
        if ($item_query->exists()) {
            return $item_query->first();
        }

        $item_query->fill($args);
        $item_query->save();

        return $item_query;
    }

    public function delete($args)
    {
        $item_query = Item::query()->where('id', '=', $args['id']);
        if ($item_query->exists()) {
            return $item_query->first();
        }

        return $item_query->delete() ? true : false;
    }
}
