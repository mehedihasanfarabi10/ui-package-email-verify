@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Class Data') }}</div>

                <div class="card-body">
                    <a href="{{route('create')}}" class="btn btn-primary btn-info" style="float: right;">Add New</a>
                    <table class="table table-responsive table-stripe">
                        <thead>
                            <tr>
                                <td>SL</td>
                                <td>Class Name</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classData as $key => $class)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <!-- Key auto increment: 1,2,3,4...... class_name is the database column name-->

                                <td>{{ $class->class_name }}</td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('class.edit', $class->id) }}" class="btn btn-info">Edit</a>

                                    <!-- Delete Button -->
                                    <a href="{{ route('delete', $class->id) }}" class="btn btn-danger">Delete</a>

                                    <!-- Update Button -->
                                    <a href="{{ route('class.edit', $class->id) }}" class="btn btn-primary">Update</a> <!-- Same as Edit since update will happen after editing -->
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