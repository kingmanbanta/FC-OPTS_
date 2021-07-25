<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidatorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(['role:Validator']);
    }
    public function index(){
        return view('user.validator.dashboard');
    }
    public function profile(){
        //$users = User::find('id')->paginate(1);
        //$roles = Role::all();
        //return view('admin.manage.manageAccount',compact('users'),compact('roles'));
        return view('user.requestor.profile');
    }
}
