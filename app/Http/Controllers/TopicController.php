<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TopicController extends Controller
{
    function show()
    {
        $data['topic'] = Topic::all();
        return view('topic.topic', $data);
    }

    function create()
    {
        return view('topic.create-topic');
    }

    function add(Request $request)
    {
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
        Topic::create([
            'foto' => $filename,
            'title' => $request->title,
            'date' => $request->date,
            'desc' => $request->desc,
        ]);

        return redirect('/topic');
    }

    function edit(Request $request)
    {
        $data['topic'] = Topic::find($request->id);
        return view('topic.edit-topic', $data);
    }

    function update(Request $request)
    {
        $filename = '';

        if ($request->file('foto')) {
            $extfile = $request->file('foto')->getClientOriginalExtension();
            $filename = time() . '.' . $extfile;
            $request->file('foto')->storeAs('foto', $filename);
        }

        Topic::where('id', $request->id)->update([
            'foto' => $filename,
            'title' => $request->title,
            'date' => $request->date,
            'desc' => $request->desc,
        ]);

        return redirect('/topic');
    }

    function delete(Request $request)
    {
        Topic::where('id', $request->id)->delete();
        return redirect('/topic');
    }
}
