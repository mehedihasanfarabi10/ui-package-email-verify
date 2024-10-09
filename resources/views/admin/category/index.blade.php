@extends('layouts.app')

@section('content')


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Category') }}</div>
                <br>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('category.create') }}">Add category</a>
                    <br>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $key => $categories)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $categories->category_name }}</td>
                                    <td>{{ $categories->category_slug }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $categories->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('category.delete', $categories->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Category Tables</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Categories</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $key => $categories)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $categories->category_name }}</td>
                                                <td>{{ $categories->category_slug }}</td>
                                                <td>
                                                    <a href="{{ route('category.edit', $categories->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{ route('category.delete', $categories->id) }}" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection


