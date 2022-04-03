@extends('layouts.master')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-6">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Categories</h5>
                        </div>

                        {{-- <div class="col-lg-12 mt-3">
                            @include('layouts.partials._errors')
                        </div> --}}

                        <form action="{{ route('categories.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">create categories</h3>
                                    </div>

                                    <div class="card-body">

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-list-alt fa-2x"></i></span>
                                            </div>
                                            <input type="text" class="form-control" style="height: 60px;" placeholder="category name" name="cat_name">
                                        </div>
                                        @if ($errors->has('cat_name'))
                                        <span class="text-danger">{{ $errors->first('cat_name') }}</span>
                                        @endif

                                        <div class="input-group mb-3" >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-barcode fa-2x"></i></span>
                                            </div>
                                            <input type="number" class="form-control" style="height: 60px;" placeholder="category short code" name="short_code">
                                        </div>
                                        @if ($errors->has('short_code'))
                                        <span class="text-danger">{{ $errors->first('short_code') }}</span>
                                        @endif

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-file fa-2x"></i></span>
                                            </div>
                                            <input type="text" class="form-control" style="height: 60px;" placeholder="category details" name="cat_details">
                                        </div>
                                        @if ($errors->has('cat_details'))
                                        <span class="text-danger">{{ $errors->first('cat_details') }}</span>
                                        @endif

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-images fa-2x"></i></span>
                                            </div>
                                            <input type="file" class="form-control" style="height: 60px;" placeholder="category cover" name="cat_cover">
                                        </div>
                                        @if ($errors->has('cat_cover'))
                                        <span class="text-danger">{{ $errors->first('cat_cover') }}</span>
                                        @endif

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-info"> <i class="fa fa-save"></i> Create</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
