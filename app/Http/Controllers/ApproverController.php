<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApproverController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(['role:Approver']);
    }
    public function index(){
        return view('user.approver.dashboard');
    }
    public function profile(){
        //$users = User::find('id')->paginate(1);
        //$roles = Role::all();
        //return view('admin.manage.manageAccount',compact('users'),compact('roles'));
        return view('user.requestor.profile');
    }
}
