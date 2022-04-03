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
                        <li class="breadcrumb-item active">Category List</li>
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
                <div class="col-lg-12 col-md-12 col-sm-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Category List</h5>
                        </div>

                        <div class="card">
                            <div class="card-header align-self-end">
                                <a href="{{ route('categories.create') }}" class="btn btn-outline-info btn-flat btn-sm">
                                    <i class="fa fa-plus"></i> Add Category
                                </a>

                                <a href="/export" class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-file-excel"></i> Donwload File
                                </a>

                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                                    data-target="#modal-default">
                                    Upload File <i class="fas fa-file-excel"></i>
                                </button>

                                {{-- <a class="btn btn-app">
                                    <i class="fas fa-file-excel"></i> Download File
                                </a> --}}

                                {{-- <h3 class="card-title">DataTable Category</h3> --}}
                            </div>
                            <!-- /.card-header -->


                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Upload file data</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    <form action="/importexcel" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body" >
                                            <div class="from-group">
                                                <input type="file" name="file" require>
                                            </div>
                                        </div>

                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">import excel</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>


                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>img</th>
                                            <th>title</th>
                                            <th>short code</th>
                                            <th>details</th>
                                            <th>date</th>
                                            <th>Action</th>
                                            {{-- <th>Engine version</th>
                                    <th>CSS grade</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cateogries as $index => $category)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <img src="{{ asset('cat_cover/' . $category->cat_cover) }}"
                                                        alt="img"
                                                        style="width: 68px; height: 50px; border-radius: 100%;">
                                                </td>
                                                {{-- <td>{{$category->cat_name ?? ''}}</td> --}}
                                                <td>{{ $category->cat_name ?? '' }}</td>
                                                <td>{{ $category->short_code ?? '' }}</td>
                                                <td>{{ $category->cat_details ?? '' }}</td>
                                                {{-- <td>{{$category->created_at->diffForHumans()}}</td> --}}
                                                <td>{{ $category->created_at->format('D M Y') }}</td>
                                                <td>
                                                    <a href="{{ route('categories.edit', $category->id) }}"
                                                        class="btn btn-sm btn-info"><i class="fa fa-edit"></i>
                                                        Edit</a>

                                                    <a href="javascript:;" class="btn btn-sm btn-danger sa-delete"
                                                        data-form-id="category-delete-{{ $category->id }}">
                                                        <i class="fa fa-trash-alt "></i> Delete
                                                    </a>
                                                    <form id="category-delete-{{ $category->id }}"
                                                        action="{{ route('categories.destroy', $category->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>img</th>
                                            <th>title</th>
                                            <th>short code</th>
                                            <th>details</th>
                                            <th>date</th>
                                            <th>Action</th>
                                            {{-- <th>Engine version</th>
                                    <th>CSS grade</th> --}}
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        {{-- <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($cateogries->count() > 0)
                                @foreach ($cateogries as $index => $cateogry)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$cateogry->name ?? ''}}</td>
                                    <td>action</td>
                                </tr>
                                @endforeach
                            @else
                                <h2>not data found</h2>
                            @endif
                        </tbody>
                    </table>
                </div> --}}
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
