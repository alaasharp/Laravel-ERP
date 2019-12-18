@extends('backEnd.layouts.master')
@section('title','List Companies')
@section('content')
 
 <!-- ########## START: MAIN PANEL ########## -->
 <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="/admin">index</a>
          <a class="breadcrumb-item" href="{{route('companies.index')}}">Companies</a>
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
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Data Companies</h6>
          

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Name</th>
                  <th class="wd-15p">email</th>
                  <th class="wd-15p">logo</th>
                  <th class="wd-20p">website</th>
                  <th class="wd-15p">Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($Companies as $Companie)
              <tr>
                  <td>{{$Companie->Name}}</td>
                  <td>{{$Companie->email}}</td>
                  <td>
                  @if($Companie->logo != "")
                    <img src="{{ URL::to('/storage/logos/small/' . $Companie->logo) }}"  width="42"></td>
                  @endif
                  <td>{{$Companie->website}}</td>
                  
                  <td>  
                      <a href="{{route('companies.edit',$Companie->id)}}" class="text-primary">
                      <i class="fa fa-edit"></i>
                      </a>

                      <a href="javascript:" rel="{{$Companie->id}}" rel1="delete-companie"  class="btn-danger btn-mini deleteRecord">
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