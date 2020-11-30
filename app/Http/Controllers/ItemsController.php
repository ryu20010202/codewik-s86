<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index(){
        $items = array('item1', 'item2', 'item3', 'item4', 'item5', 'item6', 'item7', 'item8', 'item9', 'item10');
        $user_name = "最新投稿一覧";
        return view('x', compact('user_name', 'items'));
    }
    //
}
