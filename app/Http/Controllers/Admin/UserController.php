<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::orderBy('id','desc')->paginate(2);
        return view('admin.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'image' => 'mimes:jpeg,png|max:2048',
        ]);
        //data validation 

        $data = $request->except(['_token', 'password', 'image']);
        $data['password'] = bcrypt($request->password);

        //password bcrypt 

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $path = 'image/user';
            $file->move($path, $file->getClientOriginalName());
            $data['image'] = $path . '/' . $file->getClientOriginalName();
        }

        User::create($data);
        session()->flash('message', 'Admin created successfully');
        return redirect()->route('user.index');
        //alert message 
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
        
          $data['user'] = User::findOrFail($id);
            return view('admin.user.edit', $data);
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
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpeg,png|max:2048',
        ]);
        //data validation 
        $data['name'] = $request->name;
        $user = User::findOrFail($id);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $path = 'image/user';
            $file->move($path, $file->getClientOriginalName());
            $data['image'] = $path . '/' . $file->getClientOriginalName();

             if ($user->image != null && file_exists($user->image)) {
                    unlink($user->image);
                }
        }

        $user->update($data);
        session()->flash('message', 'Admin Update successfully');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        session()->flash('success','User Deleted Successfully');
        return redirect()->route('user.index');
    }
}
