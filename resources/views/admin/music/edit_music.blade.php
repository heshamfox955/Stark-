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
                <h5 class="card-header text-capitalize">{{str_replace('-',' ',Request::segment(2))}}</h5>
                <div class="card-body">


                    <form action="{{route('updateMusic',$music) }}" method="post" id="basicform" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <input type="text"  name="name" required="" data-parsley-trigger="change" placeholder="Enter Name Playlist" class="form-control" value="{{$music->file_name}}">
                            <input type="hidden"  name="user_id" value="{{auth()->guard('admin')->user()->id}}">
                        </div>
                        <hr>
                        <select class="form-control" id="input-select" name="cat_id">
                            @foreach($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <select class="form-control" id="input-select" name="playlist_id">
                            @foreach($playlist as $list)
                                <option value="{{$list->id}}">{{$list->name}}</option>
                            @endforeach
                        </select>
    {{--

                        <select class="form-control" id="input-select" name="cat_id">
                            @foreach($category as $cat)
                                <option value="{{$cat->id}}" @if($cat->id == $music->cat_id) selected @endif >{{$cat->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <select class="form-control" id="input-select" name="playlist_id">
                            @foreach($playlist as $list)
                                <option value="{{$list->id}}" @if($list->id == $music->cat_id) selected @endif>{{$list->name}}</option>
                            @endforeach
                        </select>
                            --}}

                        <br>

                        <div class="form-group">
                            <label>Music</label>
                            <input type="file" class="form-control" name="file" placeholder="address">
                        </div>
                        <input type="submit" value="Save" class="btn btn-space btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection