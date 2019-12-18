@extends('backEnd.layouts.master')
@section('title','Edited Companies')
@section('content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="/admin">index</a>
          <a class="breadcrumb-item" href="{{route('companies.index')}}">Companies</a>
          <span class="breadcrumb-item active">Edited</span>
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
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Edited Companies</h6>
          <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('companies.update',$edit_Companie->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            {{method_field("PUT")}}
            <div class="form-layout form-layout-1">
              <div class="row mg-b-25">


                <div class="col-lg-8">
                  <div class="form-group">
                    <label class="form-control-label">Name : <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="Name"  placeholder="Enter Name " value="{{$edit_Companie->Name}}" required>
                    <span class="text-danger" id="chCategory_namear" style="color: red;">{{$errors->first('Name')}}</span>
                  </div>
                </div><!-- col-4 -->
                
                <div class="col-lg-8">
                  <div class="form-group">
                    <label class="form-control-label">Email : </label>
                    <input class="form-control" type="email" name="email"  placeholder="Enter Email " value="{{$edit_Companie->email}}">
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-8">
                  <div class="form-group">
                  <label class="form-control-label">logo:</label>
                    <label class="custom-file">
                      <input name="logo" type="file" id="file" class="custom-file-input" accept="image/*">
                      <span class="custom-file-control"></span>
                    </label>
                    @if($edit_Companie->logo != "")
                      <img src="{{ URL::to('/storage/logos/small/' . $edit_Companie->logo) }}"  width="42"></td>
                    @endif
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-8">
                  <div class="form-group">
                    <label class="form-control-label">Website : </label>
                    <input class="form-control" type="text" name="website"  placeholder="Enter Website " value="{{$edit_Companie->website}}" >
                  </div>
                </div><!-- col-4 -->

              
              </div><!-- row -->

              <div class="form-layout-footer">
                <input type="submit" class="btn btn-info" value="Edited">
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