<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Css;
use Illuminate\Support\Facades\Auth;

class CssesController extends Controller
{
    public function css(){
        if (Css::select('id')->count() == 0) {
            $items = null;
            return view('cs.css', compact('items'));
        }
        $items = Css::orderBy('id', 'desc')->get();

        return view('cs.css', compact('items'));
    }

    public function cssCreate(Request $request){
        $validatedData = $request->validate([
            'code' => 'required|max:255',
            'how' => 'required|max:255',
            'explanation' => 'required',
        ]);

        $css = new Css;
        $css->code = $request->code;
        $css->how = $request->how;
        $css->explanation = $request->explanation;
        $css->user_id = $request->user()->id;
        $css->save();

        return redirect('/cs');
    }

    public function show(string $id){
        $item = Css::findOrFail($id);
        return view('cs.cssShow', compact('item'));
    }

    public function edit(string $id){
        $item = Css::findOrFail($id);
        
        if(Auth::id() == $item->user_id){
            return view('cs.cssEdit', compact('item'));
        }else{
            return redirect()->route('index');
        }
    }

    public function update(Request $request, string $id){

        $css = Css::find($id);
        $css->code = $request->code;
        $css->how = $request->how;
        $css->explanation = $request->explanation;
        $css->user_id = $request->user()->id;
        $css->update();

        return redirect()->route('cssShow', ['id' => $id]);
    }

    public function destroy(Request $request){
        Css::find($request->id)->delete();
        return redirect()->route('css');
    }
    //
}
