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
                    <div class="card-header">{{ __('Create Subcategory') }}</div>

                    <br>

                    <div class="card-body">
                        <a class="btn btn-primary" href=" {{ route('category.index') }} ">All Subcategory</a>
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
                        <form action="{{ route('subcategory.store') }}" method="POST">
                            @csrf
                            <div>
                                <label for="category-name">Choose Category</label><br>
                                <select class="form-control " name="category_id">
                                    @foreach ($subcategory as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div>
                                <label for="category-name">Subcategory Name</label><br>
                                <input type="text" name="subcategory_name" value="{{ old('subcategory_name') }}"
                                    class="form -control @error('subcategory_name') is-invalid @enderror" id="category-name"
                                    placeholder="Enter subcategory name">
                                @error('subcategory_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

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
