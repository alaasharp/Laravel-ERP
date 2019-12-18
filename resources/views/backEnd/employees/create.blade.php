@extends('backEnd.layouts.master')
@section('title','Create Employees')
@section('content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="/admin">index</a>
          <a class="breadcrumb-item" href="{{route('employees.index')}}">Employees</a>
          <span class="breadcrumb-item active">Create</span>
        </nav>
      </div><!-- br-pageheader -->
     

      @if(Session::has('message'))
          <div class="alert alert-primary" style="text-align: center;">
          <button type="button" class="close" data-dismiss="alert" style="float: left;">&times;</button>
              {{Session::get('message')}}
          </div>
        @endif
      
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Create Employees</h6>
          <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('employees.store')}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-layout form-layout-1">
              <div class="row mg-b-25">

              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label">Companies: <span class="tx-danger">*</span></label>
                  <select required name="Company_id" id="Company_id" class="form-control select2" data-placeholder="Choose Company">
                    <option label="Choose country"></option>
                      @foreach($AllCompanies as $AllCompanie)
                        <option value="{{$AllCompanie->id}}">{{$AllCompanie->Name}}</option>
                      @endforeach
                  </select>
                  <span class="text-danger" id="chCategory_namear" style="color: red;">{{$errors->first('Company_id')}}</span>
                </div> 
              </div><!-- col-4 -->
             
                <div class="col-lg-8">
                  <div class="form-group">
                    <label class="form-control-label">First name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="First_name"  placeholder="Enter Name " value="{{old('First_name')}}" required>
                    <span class="text-danger" id="chCategory_namear" style="color: red;">{{$errors->first('First_name')}}</span>
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-8">
                  <div class="form-group">
                    <label class="form-control-label">last name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="last_name" placeholder="Enter last name" value="{{old('last_name')}}" required>
                    <span class="text-danger" id="chCategory_namear" style="color: red;">{{$errors->first('last_name')}}</span>
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-8">
                  <div class="form-group">
                    <label class="form-control-label">email	: </label>
                    <input class="form-control" type="email" name="email" placeholder="Enter email" value="{{old('email')}}">
                    <span class="text-danger" id="chCategory_nameen" style="color: red;">{{$errors->first('email')}}</span>
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-8">
                  <div class="form-group">
                    <label class="form-control-label">phone	: </label>
                    <input class="form-control" type="text" name="phone" placeholder="Enter phone" value="{{old('phone')}}">
                    <span class="text-danger" id="chCategory_nameen" style="color: red;">{{$errors->first('phone')}}</span>
                  </div>
                </div><!-- col-4 -->

              
              </div><!-- row -->

              <div class="form-layout-footer">
                <input type="submit" class="btn btn-info" value="Save">
              </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
           </form>

        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
     
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection
@section('jsblock')

@endsection