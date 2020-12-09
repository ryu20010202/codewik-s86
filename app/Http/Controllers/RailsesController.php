<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rails;
use Illuminate\Support\Facades\Auth;

class RailsesController extends Controller
{
    public function rails(){
        if (Rails::select('id')->count() == 0) {
            $items = null;
            return view('rails.rails', compact('items'));
        }
        $items = Rails::orderBy('id', 'desc')->get();

        return view('rails.rails', compact('items'));
    }

    public function railsCreate(Request $request){
        $validatedData = $request->validate([
            'code' => 'required|max:255',
            'how' => 'required|max:255',
            'explanation' => 'required',
        ]);

        $rails = new Rails;
        $rails->code = $request->code;
        $rails->how = $request->how;
        $rails->explanation = $request->explanation;
        $rails->user_id = $request->user()->id;
        $rails->save();

        return redirect('/rails');
    }

    public function show(string $id){
        $item = Rails::findOrFail($id);
        return view('rails.railsShow', compact('item'));
    }

    public function edit(string $id){
        $item = Rails::findOrFail($id);
        
        if(Auth::id() == $item->user_id){
            return view('rails.railsEdit', compact('item'));
        }else{
            return redirect()->route('index');
        }
    }

    public function update(Request $request, string $id){

        $rails = Rails::find($id);
        $rails->code = $request->code;
        $rails->how = $request->how;
        $rails->explanation = $request->explanation;
        $rails->user_id = $request->user()->id;
        $rails->update();

        return redirect()->route('railsShow', ['id' => $id]);
    }

    public function destroy(Request $request){
        Rails::find($request->id)->delete();
        return redirect()->route('rails');
    }
    //
}
