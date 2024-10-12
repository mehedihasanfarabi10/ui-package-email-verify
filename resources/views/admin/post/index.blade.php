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
                            <li class="breadcrumb-item active">Manage Post</li>
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
                                <h3 class="card-title">All Post</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <a class="btn btn-primary mb-3" href="{{ route('post.create') }}">Add post</a>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Category Name</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Author</th>
                                            <th>Publish Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $key => $subcategory)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $subcategory->category->category_name }}</td>
                                                <td>{{ $subcategory->title }}</td>
                                                <td>{{ $subcategory->description }}</td>
                                                <td>{{ Auth::user()->name }}</td>
                                                
                                                <td>{{ date('d m y',strtotime($subcategory->post_date )) }}</td>
                                                <td>
                                                    @if ($subcategory->status==1)
                                                        <span class="badge badge-success">Active</span>
                                                        
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>

                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="btn btn-primary">Edit</a>
                                                    {{--  <a href="{{ route('posts.delete', $subcategory->id) }}"  class="btn btn-danger delete">Delete</a>  --}}
                                                    <a href="javascript:void(0);" data-url="{{ route('post.delete', $subcategory->id) }}" class="delete btn btn-danger delete">Delete</a>

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

    {{--  ChatGPT  --}}

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
                    $.ajax({
                        url: link,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            swal("Deleted!", response.message, "success")
                                .then(() => {
                                    location.reload(); // Reload the page after deletion
                                });
                        },
                        error: function(xhr) {
                            swal("Error!", "Something went wrong.", "error");
                        }
                    });
                } else {
                    swal("Your data is safe!");
                }
            });
        });
    </script>
    
    {{--  <script>
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
        
    </script>  --}}
@endpush
