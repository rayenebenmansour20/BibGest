<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function list() {
        $tags = Tag::paginate(4);
        return view('tags.index', ['tags'=>$tags]);
    }

    public function index() {
        return view('tags.form');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'label' => 'required|unique:tags,label|max:255',
        ]);

        $tag = new Tag();

        $tag->label = $request->label;
        $tag->save();

        return redirect()->route('tags');
    }

    public function destroy($id) {
        $tag = Tag::find($id);

        $tag->delete();

        return redirect()->route('tags');
    }

    public function editview($id) {
        $tag = Tag::find($id);

        $this->validate($request, [
            'label' => 'required|unique:tags,label|max:255',
        ]);

        return view('tags.editform')->with('tag', $tag);
    }

    public function edit(Request $request, $id) {
        $tag = Tag::find($id);

        $tag->label = $request->label;
        $tag->save();

        return redirect()->route('tags');
    }

}
