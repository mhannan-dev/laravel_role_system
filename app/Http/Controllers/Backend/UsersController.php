<?php

namespace App\Http\Controllers\Backend;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "User";
        $data['users'] = User::all();
        return view('backend.pages.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Create new user";
        $data['users'] = User::all();
        $data['roles'] = Role::all();
        
        return view('backend.pages.users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Validation Data
         $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        // Create New User
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        toastr('Data added successfully !!', 'success');
        return redirect()->route('admin.users.index');
        
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
        $data['user'] = User::findOrFail($id);
        $data['title'] = "Create new user";
        return view('backend.pages.users.edit', $data);
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
         // Validation Data
         $request->validate([
            'name' => 'required|max:100|unique:Users,name,' . $id
        ], [
            'name.requried' => 'Please give a User name'
        ]);
        $user = User::findOrFail($id);
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $user->syncPermissions($permissions);
        }
        toastr('Data updated successfully !!', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $user = User::findById($id);
        if (!is_null($user)) {
            $user->delete();
        }
        toastr('User has been deleted !!', 'success');
        return back();
    }
}
