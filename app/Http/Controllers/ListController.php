<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function homePage(){
        return view('list-item');
    }
    public function addNewItem(request $request){
        $items= new Item();
        $items->item= $request->text;
        $items->save();
        return 'done';
    }
}
