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
}
