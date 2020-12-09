<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Html;
use Illuminate\Support\Facades\Auth;

class HtmlsController extends Controller
{
    public function html(){
        if (Html::select('id')->count() == 0) {
            $items = null;
            return view('html', compact('items'));
        }
        $items = Html::orderBy('id', 'desc')->get();

        return view('html', compact('items'));
    }

    public function htmlCreate(Request $request){
        $validatedData = $request->validate([
            'code' => 'required|max:255',
            'how' => 'required|max:255',
            'explanation' => 'required',
        ]);

        $html = new Html;
        $html->code = $request->code;
        $html->how = $request->how;
        $html->explanation = $request->explanation;
        $html->user_id = $request->user()->id;
        $html->save();

        return redirect('/html');
    }

    public function show(string $id){
        $item = Html::findOrFail($id);
        return view('htmlShow', compact('item'));
    }

    public function edit(string $id){
        $item = Html::findOrFail($id);
        
        if(Auth::id() == $item->user_id){
            return view('htmlEdit', compact('item'));
        }else{
            return redirect()->route('index');
        }
    }

    public function update(Request $request, string $id){

        $html = Html::find($id);
        $html->code = $request->code;
        $html->how = $request->how;
        $html->explanation = $request->explanation;
        $html->user_id = $request->user()->id;
        $html->update();

        return redirect()->route('htmlShow', ['id' => $id]);
    }

    public function destroy(Request $request){
        Html::find($request->id)->delete();
        return redirect()->route('html');
    }
    //
}
