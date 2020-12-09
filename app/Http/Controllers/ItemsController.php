<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function index(){
        $items = array('HTML', 'CSS', 'JavaScript', 'Ruby', 'Ruby on Rails', 'PHP', 'laravel');
        
        $count = 0;
        return view('index', compact('items', 'count'));
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/');
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

    public function show(string $id){
        $item = Item::findOrFail($id);
        return view('rubyShow', compact('item'));
    }

    public function edit(string $id){
        $item = Item::findOrFail($id);
        
        if(Auth::id() == $item->user_id){
            return view('rubyEdit', compact('item'));
        }else{
            return redirect()->route('index');
        }
    }

    public function update(Request $request, string $id){

        $ruby = Item::find($id);
        $ruby->code = $request->code;
        $ruby->how = $request->how;
        $ruby->explanation = $request->explanation;
        $ruby->user_id = $request->user()->id;
        $ruby->update();

        return redirect()->route('rubyShow', ['id' => $id]);
    }

    public function destroy(Request $request){
        Item::find($request->id)->delete();
        return redirect()->route('ruby');
    }
    //
}
