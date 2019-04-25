@extends('admin.index')
@section('content')
    <div class="container-fluid  dashboard-content">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h5 class="card-header text-capitalize">{{str_replace('-',' ',Request::segment(2)).' '.'( '.$cats->name.' )'}}</h5>
                <div class="card-body">
                    <form action="{{ url('/admin/edit-category/'.$cats->id) }}" method="post" id="basicform" data-parsley-validate="" novalidate="">
                        {{ csrf_field() }}
                        <select class="form-control" id="input-select" name="block">
                            @if($cats->block == 0)
                                <option value="0" selected>ON</option>
                                <option value="1">OFF</option>
                            @endif
                        </select>
                        <hr>

                        <div class="form-group">
                            <label>Name Category</label>
                            <input type="text"  name="name" value="{{$cats->name}}" required="" data-parsley-trigger="change" placeholder="Category" class="form-control">
                        </div>

                        <input type="submit" value="Save" class="btn btn-space btn-primary">

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection