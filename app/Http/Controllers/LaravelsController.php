<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laravel;
use Illuminate\Support\Facades\Auth;

class LaravelsController extends Controller
{
    public function laravel(){
        if (Laravel::select('id')->count() == 0) {
            $items = null;
            return view('laravel.laravel', compact('items'));
        }
        $items = Laravel::orderBy('id', 'desc')->get();

        return view('laravel.laravel', compact('items'));
    }

    public function laravelCreate(Request $request){
        $validatedData = $request->validate([
            'code' => 'required|max:255',
            'how' => 'required|max:255',
            'explanation' => 'required',
        ]);

        $laravel = new Laravel;
        $laravel->code = $request->code;
        $laravel->how = $request->how;
        $laravel->explanation = $request->explanation;
        $laravel->user_id = $request->user()->id;
        $laravel->save();

        return redirect('/laravels');
    }

    public function show(string $id){
        $item = Laravel::findOrFail($id);
        return view('laravel.laravelShow', compact('item'));
    }

    public function edit(string $id){
        $item = Laravel::findOrFail($id);
        
        if(Auth::id() == $item->user_id){
            return view('laravel.laravelEdit', compact('item'));
        }else{
            return redirect()->route('index');
        }
    }

    public function update(Request $request, string $id){

        $laravel = Laravel::find($id);
        $laravel->code = $request->code;
        $laravel->how = $request->how;
        $laravel->explanation = $request->explanation;
        $laravel->user_id = $request->user()->id;
        $laravel->update();

        return redirect()->route('laravelShow', ['id' => $id]);
    }

    public function destroy(Request $request){
        Laravel::find($request->id)->delete();
        return redirect()->route('laravel');
    }
    //
}
