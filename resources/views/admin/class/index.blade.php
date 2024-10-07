@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Class Data') }}</div>

                <div class="card-body">
                <a href="" class="btn btn-primary btn-info" style="float: right;">Add New</a>
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
                                <!-- Key auto barbe 1,2,3,4...... 
                                 class_name database column name-->

                                <td>{{$class->class_name}}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-info">Edit</a>
                                    <a href="" class="btn btn-primary btn-danger">Delete</a>
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