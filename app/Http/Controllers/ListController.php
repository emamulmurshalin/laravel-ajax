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
    public function editItem(Request $request){
        $itemById= Item::find($request->id);
        $itemById->item= $request->value;
        $itemById->save();
        return $request->all();
    }
    public function searchItem(Request $request){
        $term= $request->term;
        $items= Item::where('item', 'LIKE', '%'.$term.'%')->get();
        /*$total= count($items);
        return $total;*/
        if (count($items) == 0){
           $searchResult[]= 'Not Found';
           return $searchResult;
        }
        else{
            foreach ($items as $item){
                $searchResult[]= $item->item;
                return $searchResult;
            }
        }
        /*return $availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];*/
    }
}
