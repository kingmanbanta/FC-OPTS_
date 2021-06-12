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
}
