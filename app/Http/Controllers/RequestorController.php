<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Staff;
use App\Models\Department;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Redirect,Response;

class RequestorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(['role:Requestor']);
    }
    public function index(){
        return view('user.requestor.dashboard');
    }
    public function profile(){
        $user = User::join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('roles.display_name','roles.id')
        ->where('roles.display_name', '=', 'Requestor')
        ->first();
        $department=Department::all();
        return view('user.layout.profile',compact('user','department'));
    }
    public function changeProfilePic(Request $request)
    {
        $path ='user/';
        $file =$request->file('profile_pic');
        $new_name ='UIMG_'.date('Ymd').uniqid().'.jpg';
        
        $upload = $file->move(public_path($path), $new_name);

        if( !$upload){
            return response()->json(['status'=>0,'msg'=>'something went wrong, upload new picture failed']);
        }else{
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];
            if($oldPicture !=''){
                if(\File::exists(public_path($path.$oldPicture))){
                    \File::delete(public_path($path.$oldPicture));
                }
            }

            $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

            if(!$upload){
                return response()->json(['status'=>0,'msg'=>'something went wrong,updating picture in db failed']);
            }else{
                return response()->json(['status'=>1,'msg'=>'your profile picture have been updated succesfully']);
            }
        }
    }
    public function update(Request $request, $id)
    {
        
    }
}
