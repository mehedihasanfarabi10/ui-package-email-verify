@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">{{ __('New Student Create') }}
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
                            <h2>Login Form</h2>
                            <form action="{{ route('students.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="class">Class Name</label>
                                    {{-- Data get from class_id --}}
                                    <select class="form-control" name="class_id">
                                        @foreach ($classess as $row)
                                        
                                        <option value="{{$row->id }}">{{ $row->class_name }}</option>
                                        
                                        @endforeach
                                    </select>

                                </div>
                                {{-- Name field Start --}}
                                <div class="form-group">
                                    <label for="class">Student Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror  " id="class"
                                        placeholder="Enter your name" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                {{-- Name Field End --}}

                                {{-- Roll field Start --}}
                                <div class="form-group">
                                    <label for="class">Roll</label>
                                    <input type="text" name="roll" value="{{ old('roll') }}"
                                        class="form-control @error('roll') is-invalid @enderror  " id="class"
                                        placeholder="Enter your roll" required>
                                    @error('roll')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                {{-- Roll Field End --}}

                                {{-- Email field Start --}}
                                <div class="form-group">
                                    <label for="class">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror  " id="class"
                                        placeholder="Enter your email" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                {{-- Email Field End --}}
                                
                                {{-- Phone field Start --}}
                                <div class="form-group">
                                    <label for="class">Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}"
                                        class="form-control @error('phone') is-invalid @enderror  " id="class"
                                        placeholder="Enter your phone" required>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                {{-- Roll Field End --}}

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
