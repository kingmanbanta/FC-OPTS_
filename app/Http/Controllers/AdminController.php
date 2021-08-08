<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Building;
use App\Models\Department;
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
    public function building_department(){
        $building = Building::all();
        $department = Department::all();
        return view('admin.building_department.managebuildingdepartment',compact('department','building'));
    }

    public function addDepartmentSave(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|unique:departments',
            'dept_name' => 'required|max:255',
            'build_id' => 'required|max:255',            
        ]);
        if ($validator->fails())
        {
            return Response::json(['errors' => $validator->errors()]);
        }
        else{
            $department= new Department;
            $department->id = $request->input('id');
            $department->Dept_name = $request->input('dept_name');
            $department->building_id = $request->input('build_id');    
            
            $department->save();
            return Response::json(['success' => '1']);
        }
       
    
       }
       public function addBuildingSave(Request $request){
        $validator = Validator::make($request->all(), [
            'build_name' => 'required|max:255',
            'address' => 'required|max:255',            
        ]);
        if ($validator->fails())
        {
            return Response::json(['errors' => $validator->errors()]);
        }
        else{
            $building= new Building;
            $building->Building_name = $request->input('build_name');
            $building->Address = $request->input('address');
            
            $building->save();
            return Response::json(['success' => '1']);
        }
       
       }
       public function dept_update(Request $request, $id)
    {
        $department = Department::find($id);
        $department->id = $request->input('dept_edit_idd');
        //$department->id->sync($request->dept_edit_id);
        $department->Dept_name = $request->input('dept_edit_name');
        
        $department->save();                
    }

    public function dept_delete($id)
    {
        $department = Department::find($id);
        $department->delete();
        //return $users;
    }
    public function build_delete($id)
    {
        $department = Building::find($id);
        $department->delete();
        //return $users;
    }
    public function build_update(Request $request, $id)
    {
        $building = Building::find($id);
        $building->Building_name = $request->input('build_edit_name');
        //$department->id->sync($request->dept_edit_id);
        $building->Address = $request->input('build_edit_add');
        
        $building->save();                
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
    public function profile(){
        $user = User::join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->join('roles', 'role_user.role_id', '=', 'roles.id')
                    ->select('roles.display_name','roles.id')
                    ->where('roles.display_name', '=', 'Administrator')
                    ->first();
                    $department=Department::all();
        return view('admin.profile',compact('user','department'));
    }
    public function admin_profile_update(Request $request, $id)
    {
        /*$this->validate($request,[
            'uname' => ['required', 'string', 'max:255'],
            'uemail' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'upassword' => ['required', 'string', 'min:8', 'confirmed'],
              
        ]);*/
        $users = User::find($id);
        $users->name = $request->input('upname');
        $users->email = $request->input('upemail');
        //$users->password =Hash::make($request['upassword']);
        
        if(!empty($request->uppassword)){
            $users->password =Hash::make($request['uppassword']);
        }else{
            
        }
        $users->save();
    }
    
      

    
    
}
