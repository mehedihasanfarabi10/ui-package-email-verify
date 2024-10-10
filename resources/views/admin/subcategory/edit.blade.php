@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"> sub
                    <div class="card-header">{{ __('Update category') }}</div>

                    <br>

                    <div class="card-body">
                        <a class="btn btn-primary" href=" {{ route('subcategory.index') }} ">All Subcategory</a>
                        <br>


                        <h2>Category Form</h2>
                        <form action="{{ route('subcategory.update', $subcategories->id) }}" method="POST">
                            @csrf
                            <div>
                                <label for="category-name">Choose Category</label><br>
                                <select class="form-control " name="category_id">
                                    @foreach ($newcategory as $categories)
                                        <option value="{{ $categories->id }}" @if ($categories->id==$subcategories->category_id)
                                            selected
                                            
                                        @endif>
                                            {{ $categories->category_name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div>
                                <label for="category-name">Subcategory Name</label><br>
                                <input type="text" name="subcategory_name" value="{{ $subcategories->subcategory_name }}"
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
                                <input class="btn btn-primary" type="submit" value="Update">

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    @push('script')
    @endpush
@endsection
