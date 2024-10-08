@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">{{ __('Student Data Edit') }}
                        <a href="{{ route('students.index') }}" class="btn btn-primary btn-danger" style="float: right;">
                            All Students
                        </a>
                    </div>

                    <div class="card-body">

                        <!-- For success message -->

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                        <!-- Form Start -->




                        <style>
                            .form-container {
                                background-color: #fff;
                                padding: 20px;
                                border-radius: 8px;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                max-width: 400px;
                                width: 100%;
                            }

                            .form-container h2 {
                                text-align: center;
                                margin-bottom: 20px;
                            }

                            .form-group {
                                margin-bottom: 15px;
                            }

                            label {
                                display: block;
                                margin-bottom: 5px;
                                font-weight: bold;
                            }

                            input[type="email"],
                            input[type="password"] {
                                width: 100%;
                                padding: 10px;
                                border: 1px solid #ccc;
                                border-radius: 5px;
                                font-size: 16px;
                            }

                            input[type="email"]:focus,
                            input[type="password"]:focus {
                                border-color: #007bff;
                                outline: none;
                            }

                            .submit-btn {
                                width: 100%;
                                padding: 10px;
                                background-color: #007bff;
                                color: #fff;
                                border: none;
                                border-radius: 5px;
                                font-size: 16px;
                                cursor: pointer;
                            }

                            .submit-btn:hover {
                                background-color: #0056b3;
                            }
                        </style>




                        <div class="form-container">
                            <h2>Edit Student Data</h2>
                            <form action="{{ route('students.update', $student->id) }}" method="POST">  <!-- Update Route -->
                                @csrf
                                <input type="hidden" name="_method" value="PUT" />
                                @method('PUT')  <!-- This tells Laravel to treat the request as PUT -->
                        
                                <div class="form-group">
                                    <label for="class">Class Name</label>
                                    <select class="form-control" name="class_id">
                                        @foreach ($classess as $row)
                                            <option value="{{ $row->id }}" 
                                                @if ($row->id == $student->class_id) selected @endif>
                                                {{ $row->class_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                        
                                <div class="form-group">
                                    <label for="name">Student Name</label>
                                    <input type="text" name="name" value="{{ $student->name }}" class="form-control" required>
                                </div>
                        
                                <div class="form-group">
                                    <label for="roll">Roll</label>
                                    <input type="text" name="roll" value="{{ $student->roll }}" class="form-control" required>
                                </div>
                        
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ $student->email }}" class="form-control" required>
                                </div>
                        
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" value="{{ $student->phone }}" class="form-control" required>
                                </div>
                        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        




                        <!-- Form End -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
