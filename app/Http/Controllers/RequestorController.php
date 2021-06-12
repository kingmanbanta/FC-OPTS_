<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(['role:Requestor']);
    }
    public function index(){
        return view('user.requestor.dashboard');
    }
}
