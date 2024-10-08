@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('All Students Data') }}</div>

                    <div class="card-body">
                        <a href="{{ route('students.create') }}" class="btn btn-primary btn-info" style="float: right;">
                            New Student
                        </a>
                        <table class="table table-responsive table-stripe">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <thead>
                                <tr>
                                    <td>SL</td>
                                    <td>ٌRoll</td>
                                    <td>Student Name</td>
                                    <td>Email</td>
                                    <td>Phone</td>
                                    <td>Class Name</td>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studenty as $key => $student)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <!-- Key auto increment: 1,2,3,4...... class_name is the database column name-->

                                        <td>{{ $student->roll }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->class_id }}</td>

                                        <td>

                                           
                                            <!-- Edit Button -->
                                            <a href="{{route('students.edit', $student->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('students.show', $student->id)}}" class="btn btn-primary">Show</a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                                <!-- For success message -->


                                                @csrf
                                                {{--  hidden input er maddhome delete method pass  --}}
                                                <input type="hidden" name="_method" value="DELETE" />


                                                <button href="{{ route('students.destroy', $student->id) }}"
                                                    class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                            {{--  <a href="{{ route('students.destroy', $student->id) }}" class="btn btn-danger">Delete</a>  --}}

                                            <!-- Update Button -->
                                            <a href="" class="btn btn-primary">Update</a>
                                            <!-- Same as Edit since update will happen after editing -->
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
