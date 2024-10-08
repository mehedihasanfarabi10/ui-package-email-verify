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

                                            {{-- 

                                            {{ route('class.edit', $class->id) }}
                                             {{ route('delete', $class->id) }}
                                              {{ route('class.edit', $class->id) }}
                                            
                                            --}}
                                            <!-- Edit Button -->
                                            <a href="" class="btn btn-info">Edit</a>

                                            <!-- Delete Button -->
                                            <a href="" class="btn btn-danger">Delete</a>

                                            <!-- Update Button -->
                                            <a href=""
                                                class="btn btn-primary">Update</a>
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
