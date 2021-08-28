<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use App\Models\Staff;
use App\Models\Supplier;
use App\Models\Item;
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
        $id = Auth::user()->id;
        /*$user = User::join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->join('roles', 'role_user.role_id', '=', 'roles.id')
                    ->join('staff', 'users.id', '=', 'staff.user_id')
                    ->join('departments', 'staff.department_id', '=', 'departments.id')
                    ->select('roles.display_name','roles.id','staff.mname','staff.lname','staff.sex',
                    'staff.Address','staff.Contact_no','departments.Dept_name')
                    ->where('roles.display_name', '=', 'Approver')
                    ->first();*/
        $user = User::join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->join('roles', 'role_user.role_id', '=', 'roles.id')
                    ->select('roles.display_name','roles.id')
                    ->where('users.id', '=', $id)
                    ->first();
        $userr = User::join('staff', 'users.id', '=', 'staff.user_id')
                    ->join('departments', 'staff.department_id', '=', 'departments.id')
                    ->select('staff.id','staff.mname','staff.lname','staff.sex',
                    'staff.Address','staff.Contact_no','departments.Dept_name','departments.id')
                    ->where('staff.id', '=', $id)
                    ->first();
                    $department=Department::all();            
                    return view('user.layout.profile',compact('user','userr','department'));
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
        $users = User::find($id);
        if(!empty([ $request->up_fname, $request->up_email])){
            $users->name = $request->input('up_fname');
            $users->email = $request->input('up_email');
        }else{
            
        }

        
        $staff = Staff::find($id);
        if($staff === null){
        $staff = new Staff;
        $staff->id = $request->input('up_id');
        }else{

        }
        if(!empty([$request->up_fname,
                    $request->up_mname,
                    $request->up_lname,
                    $request->up_sex,
                    $request->up_contact,
                    $request->up_address,
                    $request->up_dept_id,
                    
        ])){
            $staff->fname = $request->input('up_fname');
        $staff->mname = $request->input('up_mname');
        $staff->lname = $request->input('up_lname');
        $staff->sex = $request->input('up_sex');
        $staff->Contact_no = $request->input('up_contact');
        $staff->Address = $request->input('up_address');
        $staff->department_id = $request->input('up_dept_id');
        $staff->user_id = $request->input('up_id');

        }else{

        }        
        //$users->password =Hash::make($request['upassword']);
        $staff->save();
        $users->save();
        return Response::json(['success' => '1']);
       
    }
    public function update_pasword(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'old_password'=>[
                'required', function($attribute, $value, $fail){
                    if( !Hash::check($value, Auth::user()->password) ){
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:30'
             ],
            'new_up_password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:new_up_password',
        ]);
        
        if(!$validator->passes()){
            return Response::json(['errors' => $validator->errors()]);
        }else{
            $users = User::find($id);
            $users->password =Hash::make($request['new_up_password']);
            $users->save();
            return Response::json(['success' => '1']);

        }
    }
    public function supplieritems(){
        return view('user.processor.supplieritems');
    }
    public function supplieritemsSave(Request $request){
        
        $rules = [];
        foreach($request->input('item_no') as $key => $value) {
            $rules["item_desc.{$key}"] = 'required';
            $rules["brand.{$key}"] = 'required';
            $rules["unit.{$key}"] = 'required';
            
            $data=json_decode($rules, true);
        }
        
       $validator = Validator::make($request->all(), $data,[
            /*'business_name' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'business_address' => 'required',
            'item_desc' => 'required',
            'brand' => 'required',
            'unit'  => 'required',*/
        ]);
        if ($validator->fails())
        {
            return Response::json(['errors' => $validator->errors()]);
        }else{
            
            foreach($request->input('item_no') as $key => $value) {

                $item = new Item;
                $item->item_Desc = $request->get('item_desc')[$key];
                $item->item_Brand = $request->get('brand')[$key];
                $item->item_Unit = $request->get('unit')[$key];
                $item->save();
            }

        /*$supplier = new Supplier;
        $supplier->business_Name = $request->input('business_name');
        $supplier->contact_Person = $request->input('contact_person');
        $supplier->contact_No = $request->input('phone');
        $supplier->email = $request->input('email');
        $supplier->business_add = $request->input('business_address');
        *
                
            $item = new Item;
            $item->save($datasave);
            
        }*/
    }   
            
        //$supplier->save();
        //$supplier->attach($item);
        //return Response::json(['success' => '1']);
       
    

}
}
