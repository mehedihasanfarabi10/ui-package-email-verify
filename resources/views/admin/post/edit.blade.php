@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="  card-header">
                        <h3 class="card-title">Post Edit</h3>

                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        {{--  <input type="hidden" name="id" value="{{$post->id}}">  --}}
                        <a class="btn btn-primary" href="{{ route('post.index') }}">All Posts</a>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" name="title" value="{{ $post->title }}" class="form-control"
                                    id="title" placeholder="Enter post title" required>
                            </div>

                            {{--  Category  --}}
                            <div class="form-group">
                                <label for="category">Category</label>
                                {{--  <option disabled selected>
                                    Choose category with subcategory
                                </option>  --}}
                                <select class="form-control" name="category_id">
                                    @foreach ($category as $cat)
                                        {{--  <option disabled class="text-primary">
                                            {{ $cat->category_name }}
                                        </option>  --}}
                                        {{--  @php
                                            $subcategory = DB::table('subcategories')
                                                ->where('category_id', $cat->id)
                                                ->get();
                                        @endphp  --}}


                                        <option value="{{ $cat->id }}" class="text-primary">
                                            {{ $cat->category_name }}
                                        </option>



                                        {{--  @foreach ($subcategory as $sub)
                                            <option style="color: #10e625" value="{{ $sub->id }}">
                                                ---{{ $sub->subcategory_name }}
                                            </option>
                                        @endforeach  --}}
                                    @endforeach

                                </select>
                            </div>

                            {{--  Subcategory  --}}
                            <div class="form-group">
                                <label for="category">Subcategory</label>
                                <select class="form-control" name="subcategory_id">
                                    @php
                                        $subcategory = DB::table('subcategories')
                                            ->where('category_id', $cat->id)
                                            ->get();
                                    @endphp
                                    @foreach ($subcategory as $sub)
                                        <option style="color: #10e625" value="{{ $sub->id }}"
                                            @if ($sub->id == $post->subcategory_id) selected @endif>
                                            {{ $sub->subcategory_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{--  Date time  --}}
                            <div class="form-group">
                                <label for="category">Post Date</label>
                                <input type="date" name="post_date" value="{{ $post->post_date }}"
                                    placeholder="Enter your post date" class="form-control" required />
                            </div>


                            {{--  Description  --}}
                            <div class="form-group">
                                <label for="category">Description</label>
                                <textarea type="text" id="summernote" name="description" rows="15" value="{{ $post->description }}"
                                    placeholder="Enter your post description" class="form-control" required>


                                    </textarea>
                            </div>

                            {{--  Tags  --}}
                            <div class="form-group">
                                <label for="category">Tags</label>
                                <input type="text" name="tags" value="{{ $post->tags }}"
                                    placeholder="Enter your post tags" class="form-control" required />
                            </div>

                            {{--  File input  --}}
                            <div class="form-group">
                                <label for="Chooseimage">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image"
                                            value="{{ old('image') }}">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    {{--  Old image  --}}
                                    <input type="hidden" name="old_image" value="{{ $post->image }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="status"
                                    @if ($post->status == 1) checked @endif value="1">
                                <label class="form-check-label" for="status">Published</label>
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
                            <button type="submit" class="btn btn-primary">Update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


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
