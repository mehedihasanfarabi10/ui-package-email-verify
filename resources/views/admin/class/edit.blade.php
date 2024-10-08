@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Class') }}
                    <a href="{{route('class')}}" class="btn btn-danger" style="float: right;">All Classes</a>
                </div>

                <div class="card-body">
                    <!-- Success Message -->
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Error Message -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Edit Form -->
                    <div class="form-container">
                        <h2>Edit Class</h2>
                        <form action="{{ route('class.update', $classData->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- This will tell Laravel to treat the request as PUT -->

                            <div class="form-group">
                                <label for="class_name">Class Name</label>
                                <input type="text" name="class_name" class="form-control" value="{{ $classData->class_name }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
