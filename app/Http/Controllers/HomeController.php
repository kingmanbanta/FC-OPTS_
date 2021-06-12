<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function manageAccount()
    {
        $users=User::orderby('id','desc')->paginate(10);
        $roles = Role::all();
        return view('admin.manage.manageAccount',compact('users'),compact('roles'));
    }
    public function create(Request $data){
            $this->validate($data,[
                'name' =>'required',
                'email' =>'required',
                'password' =>'required',
                  
            
        ]);
        //$user->attachRole($request->role_id);
        $query=DB::table('users')->insert([
            'name'=>$data->input('name'),
            'email'=>$data->input('email'),
            'password'=>$data->input('password'),
            'role_id'=>$data->attachRole('role_id') 
        ]);
    
    

    }


    
}
