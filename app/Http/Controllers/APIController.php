<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Input;


use App\Companies;
use App\Employees;
use Image;

class APIController extends Controller
{
   
    /// Companies
    public function showCompanies(){
        $Companies=Companies::orderBy('id','desc')->get();
        return response()->json(['status'=>true,'success' => $Companies], 200); 
    }

   /// Employees
    public function ShowEmployees(){
        $Employees=Employees::orderBy('id','desc')->get();
        return response()->json(['status'=>true,'success' => $Employees], 200); 
    }











}
