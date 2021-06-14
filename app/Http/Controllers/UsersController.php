<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
              $Id=$request->get('buscarpor');

        $datos['users']=User::all();
        return view('users.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()){
        $roles= Role::where('id', $request->role_id)->first();
        $permissions = $roles->permissions;

        return $permissions;
        }


         $roles = Role::all();
        return view('users.create',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


     $this->validate($request,[
        'cedula' => 'required',
        'name' => 'required',
        'email'=> 'required',
        'password' => 'required',
    ]);


    $user = new User;
    $user->cedula= $request->cedula;
    $user->name= $request->name;
    $user->email= $request->email;
    $user->password=Hash::make($request->password);
    $user->save();




if($request->role != null){
    
    $user->roles()->attach($request->role);

    $user->save();

}



if($request->permissions !=null){
    foreach ($request->permissions as $permission) {
        $user->permissions()->attach($permission);
        $user->save();
    }
}

    
    return redirect()->route('users.index')
                    ->with('success','user created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles= Role::get();
        $userRole=$user->roles->first();
        if($userRole != null){
            $rolePermissions=$userRole->allRolePermissions;

        }else{
            $rolePermissions= null;
        }
        $userPermissions=$user->permissions;
        

        return view('users.edit',['user'=>$user, 'roles'=>$roles, 'userRole'=>$userRole, 'rolePermissions'=>$rolePermissions, 'userPermissions'=>$userPermissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       $this->validate($request,[
        'name' => 'required',
        'email'=> 'required',
        'password' => 'required',
    ]);
    $user->name= $request->name;
    $user->email= $request->email;
    if($request->password!= null){
        $user->password = Hash::make($request->password);
    }
    $user->save();


    $user->roles()->detach();
    $user->permissions()->detach();

    if($request->role != null){
        $user->roles()->attach($request->role);
        $user->save();
    }
    if($request->permissions != null){
        foreach ($request->permissions as $permission) {
        $user->permissions()->attach($permission);
        $user->save();
        }

    }
        
        return redirect('users')->with('Mensaje','Usuario Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->permissions()->detach();
        $user->delete();

        return redirect('users')->with('Mensaje','Usuario eliminado con exito');
    }
}
