@extends('layouts.app')
@section('content')
<style>
.x_panel {
    position: relative;
    width: 100%;
    margin-bottom: 20px;
    padding: 10px 17px;
    display: inline-block;
    background: #fff;
    border: 1px solid #E6E9ED;
    -webkit-column-break-inside: avoid;
    -moz-column-break-inside: avoid;
    opacity: 1;
    -webkit-transition: all .2s ease;
    transition: all .2s ease;
    margin-left: -100%;
    margin-top: 52px;
}
</style>

    <div class="right_col" role="main">
        <div>
            <div class="page-title">
                <div class="title_left">
                    <h3>User Details</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">

                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <tr>
                                    <td width="210">Profile Picture</td>
                                    <td>    <img src="{{ asset('/images/'.$user->profile_pic) }}" width="80px"></a>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>

                                <tr>
                                    <td>Address</td>
                                    <td>{{ $user->address }}</td>
                                </tr>
                            </table>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

   


@endsection
