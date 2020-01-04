<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function homePage(){
        $items= Item::all();
        return view('list-item', ['items'=>$items]);
    }
    public function addNewItem(request $request){
        $items= new Item();
        $items->item= $request->text;
        $items->save();
    }
    public function deletItem(Request $request){
        Item::where('id', $request->id)->delete();
        return $request->all();
    }
}
