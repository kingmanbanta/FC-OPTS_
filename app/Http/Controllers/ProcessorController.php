<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(['role:Processor']);
    }
    public function index(){
        return view('user.processor.dashboard');
    }
}
