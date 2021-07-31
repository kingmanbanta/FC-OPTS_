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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        if ($validator->fails())
        {
            return Response::json(['errors' => $validator->errors()]);
        }
        else{
            $path = 'user/';
            $fontPath = public_path('fonts/osaka-re.ttf');
            $char = strtoupper($request->name[0]);
            $newAvatarName = rand(12,34353).time().'_avatar.png';
            $dest= $path.$newAvatarName;

            $createAvatar = makeAvatar($fontPath,$dest,$char);
            $picture = $createAvatar == true ? $newAvatarName : '';

            
            $users= new User;
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->picture =  $picture;
            $users->password =Hash::make($request['password']);
            $users->save();
            $users->attachRole($request->role_id);
            return Response::json(['success' => '1']);
        }
       
    
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
        //$users->password =Hash::make($request['upassword']);
        if(!empty($request->urole_id)){
            $users->roles()->sync($request->urole_id);
        }
        if(!empty($request->newpassword)){
            $users->password =Hash::make($request['newpassword']);
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
