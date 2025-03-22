<?php

namespace App\Http\Controllers;

use App\Models\Fashion;
use Illuminate\Http\Request;

class FashionController extends Controller
{
    function show(){
        $data['fashion'] = Fashion::all();
        return view('fashion.fashion', $data);
    }

    function create(){
        return view('fashion.create');
    }

    function add(Request $request){
        $request->validate([
            'foto' => 'required|image|mimes:png,jpg,jpeg,',
            'title' => 'required|string',
            'date' => 'required|date',
            'desc' => 'required|string',
        ]);

        $filename = '';

        if ($request->hasfile('foto')) {
            $extfile = $request->file('foto')->getClientOriginalExtension();
            $filename = time() . '.' . $extfile;
            $request->file('foto')->storeAs('foto', $filename);
        }
        Fashion::create([
            'foto' => $filename,
            'title' => $request->title,
            'date' => $request->date,
            'desc' => $request->desc,
        ]);

        return redirect('/fashion');
    }

    function edit(Request $request){
        $data['fashion'] = Fashion::find($request->id);
        return view('fashion.update', $data);
    }
    function update(Request $request){
        $filename = '';

        if ($request->file('foto')) {
            $extfile = $request->file('foto')->getClientOriginalExtension();
            $filename = time() . '.' . $extfile;
            $request->file('foto')->storeAs('foto', $filename);
        }

        Fashion::where('id', $request->id)->update([
            'foto' => $filename,
            'title' => $request->title,
            'date' => $request->date,
            'desc' => $request->desc,
        ]);

        return redirect('/fashion');
    }

    function delete(Request $request)
    {
        Fashion::where('id', $request->id)->delete();
        return redirect('/fashion');
    }

    
}
