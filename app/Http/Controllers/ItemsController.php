<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemsController extends Controller
{
    public function index(){
        $items = array('item1', 'item2', 'item3', 'item4', 'item5', 'item6', 'item7', 'item8', 'item9');
        $count = 0;
        return view('index', compact('items', 'count'));
    }

    public function ruby(){
        $items = \DB::table('items')->orderBy('id', 'desc')->get();

        return view('ruby', compact('items'));
    }

    public function rubyCreate(Request $request){
        $validatedData = $request->validate([
            'code' => 'required|max:255',
            'how' => 'required|max:255',
            'explanation' => 'required',
        ]);

        $ruby = new Item;
        $ruby->code = $request->code;
        $ruby->how = $request->how;
        $ruby->explanation = $request->explanation;
        $ruby->user_id = $request->user()->id;
        $ruby->save();

        return redirect('/ruby');
    }
    //
}
