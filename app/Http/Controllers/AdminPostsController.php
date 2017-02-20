<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $posts = \App\Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'image_id' => 'required',
            'body' => 'required'
        ]);
        $user = Auth::user();
        $input = $request->all();

        if($request->hasFile('image_id')){
            $file = $request->file('image_id');
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = \App\Photo::create(['path' => $name]);
            $input['image_id'] = $photo->id;
                      
        }
        $input['user_id'] = $user->id;
        \App\Post::create($input);

        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = \App\Post::find($id);
        $categories = \App\Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'title' => 'required',
        'category_id' => 'required',
        'image_id' => 'required',
        'body' => 'required'
        ]);

        $user = Auth::user();
        $input = $request->all();

        if($request->hasFile('image_id')){
            $file = $request->file('image_id');
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = \App\Photo::create(['path' => $name]);
            $input['image_id'] = $photo->id;
                      
        }
        $input['user_id'] = $user->id;
        $user->posts()->where('id', $id)->first()->update($input);

        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = \App\Post::find($id);
        $post->delete();
        return redirect('admin/posts');
    }
}
