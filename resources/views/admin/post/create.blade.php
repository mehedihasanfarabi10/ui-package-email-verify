@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="  card-header">
                        <h3 class="card-title">Post Form</h3>

                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <a class="btn btn-primary" href="{{ route('post.index') }}">All Posts</a>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="Enter post title" required>
                            </div>

                            {{--  Category  --}}
                            <div class="form-group">
                                <label for="category">Category</label>
                                <option disabled selected>
                                    Choose category with subcategory
                                </option>
                                <select class="form-control" name="category_id">
                                    @foreach ($category as $cat)
                                        @php
                                            $subcategory = DB::table('subcategories')
                                                ->where('category_id', $cat->id)
                                                ->get();
                                        @endphp
                                        {{--  <option disabled class="text-primary">
                                            {{ $cat->category_name }}
                                        </option>  --}}


                                        <option value="{{ $cat->id }}" class="text-primary">
                                            {{ $cat->category_name }}
                                        </option>



                                        @foreach ($subcategory as $sub)
                                            <option style="color: #10e625" value="{{ $sub->id }}">
                                                ---{{ $sub->subcategory_name }}
                                            </option>
                                        @endforeach
                                    @endforeach

                                </select>
                            </div>

                            {{--  Subcategory  --}}
                            {{--  <div class="form-group">
                                <label for="category">Subcategory</label>
                                <select class="form-control" name="subcategory_id">
                                    <option>
                                        Example One
                                    </option>
                                </select>
                            </div>  --}}

                            {{--  Date time  --}}
                            <div class="form-group">
                                <label for="category">Post Date</label>
                                <input type="date" name="post_date" placeholder="Enter your post date"
                                    class="form-control" required />
                            </div>


                            {{--  Description  --}}
                            <div class="form-group">
                                <label for="category">Description</label>
                                <textarea type="text" id="summernote" name="description" rows="15" placeholder="Enter your post description"
                                    class="form-control" required>

                                    </textarea>
                            </div>

                            {{--  Tags  --}}
                            <div class="form-group">
                                <label for="category">Tags</label>
                                <input type="text" name="tags" placeholder="Enter your post tags" class="form-control"
                                    required />
                            </div>

                            {{--  File input  --}}
                            <div class="form-group">
                                <label for="Chooseimage">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="status" value="1">
                                <label class="form-check-label" for="status">Publish now</label>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--  <!-- Add Toastr CSS in the header -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Add Toastr JS just before the closing </body> tag -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>  --}}
    {{--  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  --}}


    </div>


    <!-- Page specific script -->
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            {{--  CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });  --}}
        })
    </script>
@endsection
