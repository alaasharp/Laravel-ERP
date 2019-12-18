@extends('backEnd.layouts.master')
@section('title','List Employees')
@section('content')
 
 <!-- ########## START: MAIN PANEL ########## -->
 <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="/admin">index</a>
          <a class="breadcrumb-item" href="{{route('employees.index')}}">Employees</a>
          <span class="breadcrumb-item active">Show</span>
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
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Data Employees</h6>
          

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Company</th>
                  <th class="wd-15p">First name</th>
                  <th class="wd-15p">last name</th>
                  <th class="wd-20p">email</th>
                  <th class="wd-20p">phone</th>
                  <th class="wd-15p">Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($Employees as $Employee)
              <tr>
                  <td>{{$Employee->companies->Name}}</td>
                  <td>{{$Employee->First_name}}</td>
                  <td>{{$Employee->last_name}}</td>
                  <td>{{$Employee->email}}</td>
                  <td>{{$Employee->phone}}</td>
                  <td>  
                     <a href="{{route('employees.edit',$Employee->id)}}" class="text-primary">
                      <i class="fa fa-edit"></i>
                      </a>

                      <a href="javascript:" rel="{{$Employee->id}}" rel1="delete-employee"  class="btn-danger btn-mini deleteRecord">
                        <i class="fa fa-close"></i>
                      </a>

                  </td>
                </tr>
               

                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->



        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
     
      </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



   

@endsection
@section('jsblock')

 <link href="{{asset('backend/js/sweetalert.css')}}" type="text/css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="{{asset('backend/js/sweetalert.min.js')}}" type="text/javascript"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(".deleteRecord").click(function () {
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'Are you sure!',
                text:"delete",
                type:'warning',
                showCancelButton:true,
                confirmButtonText:'Yes!',
                cancelButtonText:'Cancel!',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href="/admin/"+deleteFunction+"/"+id;
            });
        });
        
    </script>

   

@endsection