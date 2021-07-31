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

class ProcessorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(['role:Processor']);
    }
    public function index(){
        return view('user.processor.dashboard');
    }
    public function profile(){
        $user = User::all();
        //$role = Role::all();
        //$user = User::join('role_user', 'role_user.user_id', '=', 'users.id')
           //         ->join('roles', 'roles.id', '=', 'role_user.role_id')
             //       ->select('users.*','roles.display_name')
               //     ->first();
        //return view('admin.manage.manageAccount',compact('users'),compact('roles'));
        return view('user.layout.profile',compact('user'));
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
}
