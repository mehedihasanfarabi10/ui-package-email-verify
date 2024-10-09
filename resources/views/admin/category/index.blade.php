@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('All Category') }}</div>

                    <br>

                    <div class="card-body">
                        <a class="btn btn-primary" href=" {{ route('category.create') }} ">Add category</a>
                        <br>

                        <table class="table table-reponsive">
                            <thead>
                                <tr>
                                    <th>Sl  </th>
                                    <th>Name </th>
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
                                            <a href="{{ route('category.edit',$categories->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('category.delete',$categories->id) }}" class="btn btn-danger">Delete</a>
                                            {{-- <a href="{{ route('category.edit', $categories->id)  }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('category.delete', $categories->id) }}" class="btn btn-danger">Delete</a>  --}}

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
