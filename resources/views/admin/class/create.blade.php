@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">{{ __('Class Create') }}
                        <a href="{{ route('class') }}" class="btn btn-primary btn-danger" style="float: right;">All Class</a>
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
                            <form action="{{ route('store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="class">Class Name</label>
                                    <input type="text" name="class_name" value="{{ old('class_name') }}"
                                        class="form-control @error('class_name') is-invalid @enderror  " id="class"
                                        placeholder="Enter your class" required>
                                    @error('class_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <!-- Database er sathe match rakhte class_name used -->
                                <!-- <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                                    </div> -->

                                <!-- <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                                    </div> -->

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
