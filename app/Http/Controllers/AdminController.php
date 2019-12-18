<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminController extends Controller
{
    public function index(){
        $menu_active=1;
        return view('backEnd.index',compact('menu_active'));
    }
   
}
