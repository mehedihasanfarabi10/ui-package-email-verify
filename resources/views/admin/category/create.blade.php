@extends('layouts.app')

@section('content')
    <!-- Add Toastr CSS in the header -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Add Toastr JS just before the closing </body> tag -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create category') }}</div>

                    <br>

                    <div class="card-body">
                        <a class="btn btn-primary" href=" {{ route('category.index') }} ">All category</a>
                        <br>

                        <script>
                            @if (Session::has('success'))
                                toastr.success("{{ Session::get('success') }}");
                            @endif

                            @if (Session::has('error'))
                                toastr.error("{{ Session::get('error') }}");
                            @endif
                        </script>



                        <h2>Category Form</h2>
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div>
                                <label for="category-name">Category Name</label><br>
                                <input type="text" name="category_name" value="{{ old('category_name') }}"
                                    class="form -control @error('category_name') is-invalid @enderror" id="category-name"
                                    placeholder="Enter category name">
                                @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            {{-- <div>
                                    <label for="category-slug">Category Slug</label><br>
                                    <input type="text" id="category-slug" name="category_slug"
                                        value="{{ old('category_name') }}"
                                        class="form -control @error('category_slug') is-invalid @enderror"
                                        placeholder="Enter category slug" required>
                                    @error('category_slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div> --}}
                            <div>

                                <br>
                                <input class="btn btn-primary" type="submit" value="Submit">

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
