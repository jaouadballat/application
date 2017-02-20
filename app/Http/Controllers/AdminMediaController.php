<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMediaController extends Controller
{
    public function index(){
    	$photos = \App\Photo::all();
    	return view('admin.media.index', compact('photos'));
    }

    public function create(){
    	return view('admin.media.create');
    }

    public function store(Request $request){
    	$file = $request->file('file');
    	$name = $file->getClientOriginalName();
    	$file->move('images', $name);
    	\App\Photo::create(['path' => $name]);
    }

    public function destroy($id){
    	$photo = \App\Photo::find($id);
    	/*unlink(public_path()."/images/".$photo->path);*/
    	 public_path()."/images/".$photo->path;
    	 $photo->delete();
    	 return redirect('admin/media');
    }
}
