@extends('admin.index')
@section('content')

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
                <h5 class="card-header text-capitalize">{{str_replace('-',' ',Request::segment(2)). ' ' . '( '.$play->name.' )'}} </h5>
                <div class="card-body">
                    <form action="{{ url('/admin/edit-playlist/'.$play->id) }}" method="post" id="basicform" data-parsley-validate="" novalidate="">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Name Category</label>
                            <input type="text"  name="name" required="" data-parsley-trigger="change" placeholder="Enter Name Playlist" class="form-control" value="{{$play->name}}">
                            <input type="hidden"  name="user_id" value="{{auth()->guard('admin')->user()->id}}">
                        </div>
                        <hr>
                        <select class="form-control" id="input-select" name="cat_id">
                            @foreach($category as $cat)
                                <option value="{{$cat->id}}" @if($cat->id == $play->cat_id) selected @endif>{{$cat->name}}</option>
                            @endforeach
                        </select><br>
                        <select class="form-control" name="status" id="input-select">
                                <option value="public" @if($play->status == 'public')selected @endif>Public</option>
                                <option value="private" @if($play->status == 'private')selected @endif>Private</option>
                        </select><br>
                        <input type="submit" value="Save" class="btn btn-space btn-primary">

                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection

@endsection