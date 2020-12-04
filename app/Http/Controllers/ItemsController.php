<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index(){
        $items = array('item1', 'item2', 'item3', 'item4', 'item5', 'item6', 'item7', 'item8', 'item9');
        $count = 0;
        return view('index', compact('items', 'count'));
    }

    public function ruby(){
        return view('ruby');
    }
    //
}
