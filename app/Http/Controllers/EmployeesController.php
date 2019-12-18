<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;
use Image;
use App\Employees;
use App\Companies;



class EmployeesController extends Controller
{
    public function index()
    {
        $menu_active=3;
        $Employees=Employees::orderBy('id','desc')->get();
        return view('backEnd.employees.index',compact('menu_active','Employees'));
    }

    public function create()
    {
        $menu_active=3;
        $AllCompanies=Companies::orderBy('id','desc')->get();
        return view('backEnd.employees.create',compact('menu_active','AllCompanies'));
    }

    public function checkCateName(Request $request){
        $data=$request->all();
        $type_name=$data['name'];
        $ch_cate_name_atDB=Employees::select('name')->where('name',$type_name_ar)->first();
        if($type_name==$ch_cate_name_atDB['name']){
            echo "true"; die();
        }else {
            echo "false"; die();
        }
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'Company_id'=>'required',
            'First_name'=>'required|max:255|unique:employees,First_name',
            'last_name' =>'required|max:255|unique:employees,last_name',
        ]);
        $formInput=$request->all();
        if($formInput['email'] != ""){
            $this->validate($request,[
                'email'=>'required|string|email|unique:employees,email',
            ]);
        }
        if($formInput['phone'] != ""){
            $this->validate($request,[
                'phone'=>'required|numeric',
            ]);
        }

       
        Employees::create($formInput);
        return redirect()->route('employees.create')->with('message','Added successfully');
    }

    public function show($id)
    {
        echo $id;
    }

    public function edit($id)
    {
        $menu_active=3;
        $AllCompanies=Companies::orderBy('id','asc')->get();
        $edit_employees=Employees::findOrFail($id);
        return view('backEnd.employees.edit',compact('menu_active','edit_employees','AllCompanies'));
    }

    public function update(Request $request, $id)
    {
        $update_employee=Employees::findOrFail($id);
        $this->validate($request,[
            'First_name'=>'required|max:255|unique:employees,First_name,'.$update_employee->id,
            'last_name'=>'required|max:255|unique:employees,last_name,'.$update_employee->id,
        ]);
       
        $input_data=$request->all();
        if($input_data['email'] != ""){
            $this->validate($request,[
                'email'=>'required|string|email',
            ]);
        }
        if($input_data['phone'] != ""){
            $this->validate($request,[
                'phone'=>'required|numeric',
            ]);
        }
       
       
        $update_employee->update($input_data);
        return redirect()->route('employees.index')->with('message','Edited successfully');
    }

    public function destroy($id)
    {
        $delete=Employees::findOrFail($id);
        $delete->delete();

        return redirect()->route('employees.index')->with('message','Deleted successfully');
    }
}
