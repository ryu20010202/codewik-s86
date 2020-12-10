<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Php;
use Illuminate\Support\Facades\Auth;

class PhpesController extends Controller
{
    public function php(){
        if (Php::select('id')->count() == 0) {
            $items = null;
            return view('php.php', compact('items'));
        }
        $items = Php::orderBy('id', 'desc')->get();

        return view('php.php', compact('items'));
    }

    public function phpCreate(Request $request){
        $validatedData = $request->validate([
            'code' => 'required|max:255',
            'how' => 'required|max:255',
            'explanation' => 'required',
        ]);

        $php = new Php;
        $php->code = $request->code;
        $php->how = $request->how;
        $php->explanation = $request->explanation;
        $php->user_id = $request->user()->id;
        $php->save();

        return redirect('/phpes');
    }

    public function show(string $id){
        $item = Php::findOrFail($id);
        return view('php.phpShow', compact('item'));
    }

    public function edit(string $id){
        $item = Php::findOrFail($id);
        
        if(Auth::id() == $item->user_id){
            return view('php.phpEdit', compact('item'));
        }else{
            return redirect()->route('index');
        }
    }

    public function update(Request $request, string $id){

        $php = Php::find($id);
        $php->code = $request->code;
        $php->how = $request->how;
        $php->explanation = $request->explanation;
        $php->user_id = $request->user()->id;
        $php->update();

        return redirect()->route('phpShow', ['id' => $id]);
    }

    public function destroy(Request $request){
        Php::find($request->id)->delete();
        return redirect()->route('php');
    }
    //
}
