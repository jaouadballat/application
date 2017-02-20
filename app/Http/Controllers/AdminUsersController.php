<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = \App\User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

          $roles = \App\Role::all();

         return view('admin.users.create', compact('roles'));
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
            'is_active' => 'required'
        ]);
   

      
        $input = $request->all();

        if($request->hasFile('image_id')){
            $filename = $request->file('image_id')->getClientOriginalName();
            $file = $request->file('image_id');
            
            $file->move('images', $filename);
            
            $photo = \App\Photo::create(['path' => $filename]);
            $input['image_id'] = $photo->id;
        }

        $input['password'] = bcrypt($request->password);
       
        \App\User::create($input);

          return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::find($id);
        $roles = \App\Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
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
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'role_id' => 'required',
        'is_active' => 'required'
    ]);

     $user = \App\User::find($id);
     $input = $request->all();

     if($request->hasFile('image_id')){
        $file = $request->file('image_id');
        $filename = $file->getClientOriginalName();
        $file->move('images', $filename);
        $photo = \App\Photo::create(['path' => $filename]);
        $input['image_id'] = $photo->id;
     }else{
        $input['image_id'] = $user->image_id;
     }
        
        $input['password'] = bcrypt($request->password);
        $user->update($input);
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

         $user = \App\User::find($id);
         
         unlink(public_path()."/images/".$user->photo->path);
         $user->delete();
         session()->flash('user_deleted', 'the user has been deleted !');

         return redirect('/admin/users');
    }
}
