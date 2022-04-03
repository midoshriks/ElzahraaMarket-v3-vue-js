@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Brands</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Brands List</li>
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
                            <h5 class="m-0">Brands List</h5>
                        </div>

                        <div class="card">
                            <div class="card-header align-self-end">
                                <a href="{{ route('brands.create') }}" class="btn btn-outline-info btn-flat btn-sm">
                                    <i class="fa fa-plus"></i> Add Brand
                                </a>

                                <a href="/export/brand" class="btn btn-outline-info btn-sm">
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

                                    <form action="/import/brands" method="post" enctype="multipart/form-data">
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
                                            <th>name brand</th>
                                            <th>category brand</th>
                                            <th>details</th>
                                            <th>size</th>
                                            <th>price</th>
                                            <th>code</th>
                                            <th>date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $index => $brand)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $brand->brand_name ?? '' }}</td>
                                                <td>{{ $brand->category->cat_name ?? '' }}</td>
                                                <td>{{ $brand->brand_details ?? '' }}</td>
                                                <td>{{ $brand->brand_size ?? '' }}</td>
                                                <td>${{ $brand->brand_price ?? '' }},0</td>
                                                <td><i class="fa fa-barcode"></i> {{ $brand->brand_code ?? '' }}</td>
                                                {{-- <td>
                                                    <img src="{{ asset('cat_cover/' . $category->cat_cover) }}"
                                                        alt="img"
                                                        style="width: 68px; height: 50px; border-radius: 100%;">
                                                </td> --}}
                                                <td>{{ $brand->created_at->format('D M Y') }}</td>
                                                <td>
                                                    <a href="{{ route('brands.edit', $brand->id) }}"
                                                        class="btn btn-sm btn-info"><i class="fa fa-edit"></i>
                                                        Edit</a>

                                                    <a href="javascript:;" class="btn btn-sm btn-danger sa-delete"
                                                        data-form-id="brand-delete-{{ $brand->id }}">
                                                        <i class="fa fa-trash-alt "></i> Delete
                                                    </a>
                                                    <form id="brand-delete-{{ $brand->id }}"
                                                        action="{{ route('brands.destroy', $brand->id) }}"
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
                                            <th>name brand</th>
                                            <th>category brand</th>
                                            <th>details</th>
                                            <th>size</th>
                                            <th>price</th>
                                            <th>code</th>
                                            <th>date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
