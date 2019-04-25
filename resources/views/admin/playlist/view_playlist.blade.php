@extends('admin.index')
@section('content')

    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title text-capitalize">View {{Request::segment(3)}}</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link text-capitalize">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link text-capitalize">{{Request::segment(2)}}</a></li>
                                <li class="breadcrumb-item active text-capitalize" aria-current="page">{{Request::segment(3)}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header text-capitalize">{{Request::segment(3)}}</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                <tr>
                                    <th># ID</th>
                                    <th>Name</th>
                                    <th>Add By</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($playlists as $playlist)
                                    <tr>

                                        <td>{{$playlist->id}}</td>
                                        <td>{{$playlist->name}}</td>
                                        <td>{{$playlist->user_id()->first()->name}}</td>
                                        <td>{{$playlist->status}}</td>
                                        <td>{{$playlist->cat_id()->first()->name}}</td>
                                        <td>{{$playlist->created_at}}</td>
                                        <td>{{$playlist->updated_at}}</td>
                                        <td>

                                            <div class="dd-nodrag btn-group ml-auto">
                                                <a href="{{url('admin/edit-playlist/'.$playlist->id)}}" class="btn btn-sm btn-outline-light">Edit</a>
                                                <a href="{{url('admin/delete-playlist/'.$playlist->id)}}" class="btn btn-sm btn-outline-light delete  ">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic table  -->
            <!-- ============================================================== -->
        </div>

    </div>


@endsection