<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Js;
use Illuminate\Support\Facades\Auth;

class JsesController extends Controller
{
    public function js(){
        if (Js::select('id')->count() == 0) {
            $items = null;
            return view('js.js', compact('items'));
        }
        $items = Js::orderBy('id', 'desc')->get();

        return view('js.js', compact('items'));
    }

    public function jsCreate(Request $request){
        $validatedData = $request->validate([
            'code' => 'required|max:255',
            'how' => 'required|max:255',
            'explanation' => 'required',
        ]);

        $js = new Js;
        $js->code = $request->code;
        $js->how = $request->how;
        $js->explanation = $request->explanation;
        $js->user_id = $request->user()->id;
        $js->save();

        return redirect('/jses');
    }

    public function show(string $id){
        $item = Js::findOrFail($id);
        return view('js.jsShow', compact('item'));
    }

    public function edit(string $id){
        $item = Js::findOrFail($id);
        
        if(Auth::id() == $item->user_id){
            return view('js.jsEdit', compact('item'));
        }else{
            return redirect()->route('index');
        }
    }

    public function update(Request $request, string $id){

        $js = Js::find($id);
        $js->code = $request->code;
        $js->how = $request->how;
        $js->explanation = $request->explanation;
        $js->user_id = $request->user()->id;
        $js->update();

        return redirect()->route('jsShow', ['id' => $id]);
    }

    public function destroy(Request $request){
        Js::find($request->id)->delete();
        return redirect()->route('js');
    }
    //
}
