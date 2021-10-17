@extends('layouts.app')
@section('content')
<style>
  
footer {
    margin-left: 227px;
    margin-top: 335px;
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
<div class="row">
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
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <a href="{{url('index')}}" <h2>Home</a> <small>Users</small></h2>
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

              <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="dataTables_length" id="datatable_length"></div>
                  </div>
                  <div class="col-sm-6">
                    <div id="datatable_filter" class="dataTables_filter"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="datatable" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">
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

                        <td> <img src="{{ asset('/images/'.$user->profile_pic) }}" width="80px"></a>

                        </td>

                        <td><span>
                            <a href="edit-detail/{{$user->id}}" class="btn btn-success edit_btn">Edit</a>
                            <a href="view-detail/{{$user->id}}" class="btn btn-primary">View</a>
                            <a href="delete-user/{{$user->id}}" class="btn btn-primary">Delete</a>

                            @if($user->isblocked == '0')

                            <a href="block-user/{{$user->id}}" class="btn btn-danger block-user" id="{{$user->id}}">Block</a>


                            @else

                            <a href="unblock-user/{{$user->id}}" class="btn btn-danger unblock-user">Unblock</a>

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
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

        <script>
          $('.block-user').on('click', function(e) {
            e.preventDefault();
            // var current_id = $(this).data('id');
            var current_id = $(this).attr('id');

            // alert("The id of clicked item is: " + current_id);

            $('#'+current_id).on('click', function() {
              swal({
                  title: "Are you sure you want to block user - " +current_id,
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((res) => {
                  if (res) {
                    window.location.href = "{{ url('block-user/') }}"+ current_id;
                  }
                });
            });
          });


          $(document).ready(function() {
            $('#datatable').DataTable();
          });
        </script>
        @endsection