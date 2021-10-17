@extends('layouts.app')
@section('content')


<style>
button, .buttons, .btn, .modal-footer .btn + .btn {
    margin-bottom: 4px;
    margin-right: -8px;
    margin-left: 8px;
}

.alert-success {
    margin-top: 40px;
}

.alert-danger {
    margin-top: 40px;
}

.alert-success {
    background-color: lightslategray;
    border-color: rgba(38, 185, 154, 0.88);
}
</style>


@if ($message = Session::get('success'))  
<div class="alert alert-success alert-block">  
    <button type="button" class="close" data-dismiss="alert">x</button>   
        <strong>{{ $message }}</strong>  
</div>  
@endif  
  
@if ($message = Session::get('error'))  
<div class="alert alert-danger alert-block">  
    <button type="button" class="close" data-dismiss="alert">x</button>   
        <strong>{{ $message }}</strong>  
</div>  
@endif  
<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                  <div class="col-md-14" >
                              <a href="{{route('posts.create')}}" class="btn btn-primary" >Add Blog</a>
                           </div>  
               <a href="{{url('index')}}" <h2>HOME </a><small>posts</small></h2>
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
                                 <th class="">Title</th>
                                 <th>Category</th>
                                 <th>Description</th>
                                 <th>Image</th>
                                 <th>Total Likes</th>
                                 <th>Total Comments</th>
                              <th class="no-sort sort">Action</th>
                              </tr>
                           </thead>
                           @foreach($posts as $post)
                           <tr>

                              <td>{{$post->id}}</td>
                              <td>{{$post->title}}</td>
                              <td>{{$post->category}}</td>
                              <td>{{$post->description}}</td>
                              <td>    <img src="{{ asset('/images/'.$post->profile_pic) }}" width="80 px" height="60px"></a>

                             <td>{{$total_likes}}</td>
                             <td>{{ $total_comments}}</td>


                             <td><span>
                             <a href="{{route ('posts.edit',$post->id)}}" class="btn btn-success edit_btn">Edit</a>
                             <a href="{{route ('posts.show',$post->id)}}" class="btn btn-primary">View</a>

                             @if($post->status == '0')
                           
                           <a href="block-post/{{$post->id}}" class="btn btn-danger"  >Block</a>

                      
                         @else

                         <a href="unblock-post/{{$post->id}}" class="btn btn-danger" >Unblock</a>

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