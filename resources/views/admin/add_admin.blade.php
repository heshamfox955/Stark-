@extends('admin.index')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h5 class="card-header text-capitalize">{{str_replace('-',' ',Request::segment(2))}} or Admin</h5>
            <div class="card-body">
                <form action="{{ url('/admin/add-user') }}" method="post" id="basicform" data-parsley-validate="" novalidate="">
                    {{csrf_field()}}

                    <select class="form-control" id="input-select" name="user">
                        <option value="0">Normal User</option>
                        <option value="1">Admin</option>
                    </select>
                    <hr>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="name" required="" data-parsley-trigger="change" placeholder="Enter user name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email address</label>
                        <input type="email" name="email" required="" placeholder="Enter email"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" required="" placeholder="Password" class="form-control" >
                    </div>

                    <input type="submit" value="Save" class="btn btn-space btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

@endsection