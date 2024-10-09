@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <a class="btn btn-primary" href=" {{route('category.index')}} ">All category</a>
                        <br>
                        <br>
                        <br>
                        <hr>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in! ') }} {{ Auth::user()->name }}

                        <!-- <a class="btn btn-sm btn-primary " href="{{ route('details', Crypt::encryptString('3')) }}">Show
                            Details</a> -->
                            <br>
                            <br>
                            <br>
                        <a class="btn btn-sm btn-primary " href="{{route('class')}}">
                            Class</a>
                        <a class="btn btn-sm btn-primary " href=" {{route('students.index')}} " >
                            Students</a>

                        <!-- <form action="{{ route('hashing.store') }}" method="POST">
                            @csrf
                            <div>
                                <label>Password</label>
                                <input name="password" type="password">

                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection




<!--        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->