<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Redirect,Response;



class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(['role:Administrator']);
    }
    public function index(){
        return view('admin.dashboard');
    }

    public function manageAccount(){
        $users=User::orderby('id','desc')->paginate(10);
        $roles = Role::all();
        return view('admin.manage.manageAccount',compact('users'),compact('roles'));
    }

    public function create(){
        $roles = Role::all();
        return view('admin.manage.create',compact('roles'));
    }

    public function createSave(Request $request){
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
              
        ]);
        $users= new User;
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password =Hash::make($request['password']);
        
         
        $users->save();
        $users->attachRole($request->role_id);
        return redirect()->route('manageAccount') 
                            ->with('success','Data have been saved!');
       }


       /**
	* Display the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

    public function getUserById($id)
    {
        $users = User::findOrFail($id);
        return response()->json($users);
    }
    
    public function update(Request $request, $id)
    {
        /*$this->validate($request,[
            'uname' => ['required', 'string', 'max:255'],
            'uemail' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'upassword' => ['required', 'string', 'min:8', 'confirmed'],
              
        ]);*/
        $users = User::find($id);
        $users->name = $request->input('uname');
        $users->email = $request->input('uemail');
        $users->password =Hash::make($request['upassword']);
        if(!empty($request->urole_id)){
            $users->roles()->sync($request->urole_id);
        }else{
            
        }
        
        $users->save();
        
        
       

    
        //return response()->json($users);
                        
    }
    public function delete($id)
    {
        $users = User::find($id);
        $users->delete();
        return $users;
    }
    
      

    
    
}
