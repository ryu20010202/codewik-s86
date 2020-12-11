<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Html;
use App\Models\Css;
use App\Models\Js;
use App\Models\Rails;
use App\Models\Php;
use App\Models\Laravel;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function index(){
        if (Item::select('id')->count() == 0) {
            $ruby = null;
        } else {
            $ruby = Item::orderBy('id', 'desc')->get();
        }

        if (Html::select('id')->count() == 0) {
            $html = null;
        } else {
            $html = Html::orderBy('id', 'desc')->get();
        }

        if (Css::select('id')->count() == 0) {
            $css = null;
        } else {
            $css = Css::orderBy('id', 'desc')->get();
        }

        if (Js::select('id')->count() == 0) {
            $js = null;
        } else {
            $js = Js::orderBy('id', 'desc')->get();
        }

        if (Rails::select('id')->count() == 0) {
            $rails = null;
        } else {
            $rails = Rails::orderBy('id', 'desc')->get();
        }

        if (Php::select('id')->count() == 0) {
            $php = null;
        } else {
            $php = Php::orderBy('id', 'desc')->get();
        }

        if (Laravel::select('id')->count() == 0) {
            $laravel = null;
        } else {
            $laravel = Laravel::orderBy('id', 'desc')->get();
        }

        return view('index', compact('html', 'css', 'js', 'ruby', 'rails', 'php', 'laravel'));
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }

    public function ruby(){
        if (Item::select('id')->count() == 0) {
            $items = null;
            return view('html', compact('items'));
        }
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
