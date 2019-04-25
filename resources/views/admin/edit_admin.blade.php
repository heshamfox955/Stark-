@extends('admin.index')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-capitalize">{{str_replace('-',' ',Request::segment(2)).' '.'( '.$admin->name.' )'}}</h5>
            <div class="card-body">
                <form action="{{ url('/admin/edit-admin/'.$admin->id ) }}" method="post" id="basicform" data-parsley-validate="" novalidate="">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="inputUserName">User Name</label>
                        <input id="inputUserName" type="text" name="name" data-parsley-trigger="change" placeholder="Enter user name" value="{{$admin->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email address</label>
                        <input type="email" name="email" placeholder="Enter email" autocomplete="off" class="form-control" value="{{$admin->email}}">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" required="" placeholder="Password" class="form-control" >
                    </div>

                    <input type="submit"  value="Update" class="btn btn-space btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

@endsection