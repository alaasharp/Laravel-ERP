<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Companies;
use App\Employees;
use Image;



class CompaniesController extends Controller
{
    public function index()
    {
        $menu_active=2;
        $Companies=Companies::orderBy('id','desc')->get();
        return view('backEnd.companies.index',compact('menu_active','Companies'));
    }

    public function create()
    {
        $menu_active=2;
        return view('backEnd.companies.create',compact('menu_active'));
    }

    public function checkCateName(Request $request){
        $data=$request->all();
        $type_name=$data['Name'];
        $ch_cate_name_atDB=Companies::select('Name')->where('Name',$type_name)->first();
        if($type_name==$ch_cate_name_atDB['Name']){
            echo "true"; die();
        }else {
            echo "false"; die();
        }
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'Name'=>'required|max:255|unique:companies,Name',
        ]);

        if($request->email != ""){
            $this->validate($request,[
                'email'=>'required|string|email|unique:companies,email',
            ]);
        }
        $formInput=$request->all();

        if($request->file('logo')){
            $image=$request->file('logo');
            if($image->isValid()){
                $fileName=time().'-'.str_slug($formInput['Name'],"-").'.'.$image->getClientOriginalExtension();
                $small_image_path=storage_path('app/public/logos/small/'.$fileName);
                $large_image_path=storage_path('app/public/logos/large/'.$fileName);
               
                //Resize Image
                Image::make($image)->resize(100,100)->save($small_image_path);
                Image::make($image)->resize(300,300)->save($large_image_path);
                $formInput['logo']=$fileName;
            }
        }

        Companies::create($formInput);
        return redirect()->route('companies.create')->with('message','Added successfully');
    }

    public function show($id)
    {
        echo $id;
    }

    public function edit($id)
    {
        $menu_active=2;
        $edit_Companie=Companies::findOrFail($id);
        return view('backEnd.companies.edit',compact('menu_active','edit_Companie'));
    }

    public function update(Request $request, $id)
    {
        $update_Companies=Companies::findOrFail($id);
        $this->validate($request,[
            'Name'=>'required|max:255|unique:companies,Name,'.$update_Companies->id,
        ]);
        
        $input_data=$request->all();
        if($input_data['email'] != ""){
            $this->validate($request,[
                'email'=>'required|string|email',
            ]);
        }

       

        //////UPLOAD 
        if($request->file('logo')){
            $image=$request->file('logo');
            if($image->isValid()){
        
                $fileName=time().'-'.str_slug($input_data['Name'],"-").'.'.$image->getClientOriginalExtension();
                $small_image_path=storage_path('app/public/logos/small/'.$fileName);
                $large_image_path=storage_path('app/public/logos/large/'.$fileName);
               
                //Resize Image
                Image::make($image)->resize(100,100)->save($small_image_path);
                Image::make($image)->resize(300,300)->save($large_image_path);
                $input_data['logo']=$fileName;
                 
            }
        }

      
       
        
        $update_Companies->update($input_data);
        return redirect()->route('companies.index')->with('message','Edited successfully');
    }

    public function destroy($id)
    {
        $delete=Companies::findOrFail($id);

        if($delete->logo != ""){
            $image_small=storage_path().'/app/public/logos/small/'.$delete->logo;
            $image_large=storage_path().'/app/public/logos/large/'.$delete->logo;
            if($delete->delete()){
                unlink($image_small);
                unlink($image_large);
            }
        }
       

        $delete->delete();
        Employees::where('Company_id',$id)->delete();

        return redirect()->route('companies.index')->with('message','Deleted successfully');
    }
}
