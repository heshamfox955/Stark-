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


                    <form action="{{ route('addMusic') }}" method="post" id="basicform" enctype="multipart/form-data">
                        {{csrf_field()}}

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
                        <br>


                        <div class="form-group">
                            <label>multiple Upload</label>
                            <input required type="file" class="form-control" name="files[]" placeholder="address" multiple>
                        </div>
                        <input type="submit" value="Save" class="btn btn-space btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection