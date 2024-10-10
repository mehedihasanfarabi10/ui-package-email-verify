@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update category') }}</div>

                    <br>

                    <div class="card-body">
                        <a class="btn btn-primary" href=" {{ route('category.index') }} ">All category</a>
                        <br>


                            <h2>Category Form</h2>
                            <form action="{{ route('category.update',$data->id) }}" method="POST">
                                @csrf
                                <div>
                                    <label for="category-name">Category Name</label><br>
                                    <input type="text" name="category_name" value="{{ $data->category_name }}"
                                        class="form -control"
                                        id="category-name" placeholder="Enter category name" >


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
