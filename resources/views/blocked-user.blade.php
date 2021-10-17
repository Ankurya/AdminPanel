@extends('layouts.app')
@section('content')

<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                  <a href="{{url('index')}}"  <h2>HOME </a><small>blocked users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                   
                    <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"></div></div><div class="col-sm-6"><div id="datatable_filter" class="dataTables_filter"></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">
                    <thead>
                  <tr>
                     <th width="50">Sr. No.</th>
                     <th class="">Name</th>
                     <th>Email</th>
                     <th>Address</th>
                     <th>Posts</th>
                     <th>Image</th>
              <th class="no-sort sort">Action</th>
                  </tr>
               </thead>
               @foreach($users as $user)
               <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->username}}</td>  
                  <td>{{$user->email}}</td>
                  <td>{{$user->address}}</td>
                  <td>{{$user->description}}</td>

                  <td>    <img src="{{ asset('/images/'.$user->profile_pic) }}" width="80px"></a>
                  
                  <td><span>
                             <a href="edit-detail/{{$user->id}}" class="btn btn-success edit_btn">Edit</a>
                             <a href="view-detail/{{$user->id}}" class="btn btn-primary">View</a>
                             
                           @if($user->status == '0')
                           
                             <a href="block-user/{{$user->id}}" class="btn btn-danger">Block</a>

                        
                           @else

                           <a href="unblock-user/{{$user->id}}" class="btn btn-danger">Unblock</a>

                        @endif

                        

                         </span>
                             </td>
               </tr>
               @endforeach
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<script>
   
//     $('#block-user').click(function(e){
//       e.preventDefault();
//     var id = $(this).data('id');
//     console.log(id);
//     Swal.fire({
//             title: 'block this user',
//             text: "block this user",
//             icon: 'warning',
//             showCancelButton: true,
//             confirmButtonText: 'Yes!',
//           },
//         function() {
//             $.ajax({
//                 type: "POST",
//                 url: "{{url('block-user')}}",
//                 data: {
//                    id:id
//                   },
//                 success: function (data) {
//                               //
//                     }         
//             });
//     });
// });


$(document).ready(function() {
    $('#datatable').DataTable();
} );

</script> 
              @endsection 