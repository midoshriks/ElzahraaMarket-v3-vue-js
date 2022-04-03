@extends('layouts.master')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sizes</h1>
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
                            <h5 class="m-0">Sizes</h5>
                        </div>

                        {{-- <div class="col-lg-12 mt-3">
                            @include('layouts.partials._errors')
                        </div> --}}

                        <form action="{{ route('sizes.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">create size</h3>
                                    </div>

                                    <div class="card-body">

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-crop fa-2x" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" class="form-control" style="height: 60px;" placeholder="enter size" name="size">
                                        </div>
                                        @if ($errors->has('size'))
                                        <span class="text-danger">{{ $errors->first('size') }}</span>
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
