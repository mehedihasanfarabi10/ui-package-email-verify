@extends('layouts.app')

@section('content')

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
                            <li class="breadcrumb-item active">Subcategory Tables</li>
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
                                <h3 class="card-title">All Subcategories</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <a class="btn btn-primary mb-3" href="{{ route('subcategory.create') }}">Add subcategory</a>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Category Name</th>
                                            <th>Subcategory Name</th>
                                            <th>Subcategory Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $subcategory)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $subcategory->category->category_name }}</td>
                                                <td>{{ $subcategory->subcategory_name }}</td>
                                                <td>{{ $subcategory->subcategory_slug }}</td>
                                                <td>
                                                    <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="javascript:void(0);" data-url="{{ route('subcategory.delete', $subcategory->id) }}" class="btn btn-danger delete">Delete</a>

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

@push('script')
    <script>
        $(document).on("click", ".delete", function(e) {
            e.preventDefault();
        
            var link = $(this).data('url'); // Get the URL from the button's data-url attribute
        
            if (!link) {
                console.error('Delete URL not found');
                return;
            }
        
            swal({
                title: 'Are you sure you want to delete?',
                text: "You won't be able to recover this!",
                icon: 'warning',
                buttons: {
                    cancel: "Cancel",
                    confirm: {
                        text: "Yes, delete it!",
                        value: true,
                        visible: true,
                        className: "btn-danger"
                    }
                },
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = link; // Redirect to the delete URL
                } else {
                    swal("Your data is safe!");
                }
            });
        });
        
    </script>
@endpush
