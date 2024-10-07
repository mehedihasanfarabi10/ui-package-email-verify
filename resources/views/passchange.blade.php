@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Change your password') }}</div>


                    <h2> <a class="" href="">Password Change</a>
                </div>
                </h2>

                @if (session()->has('success'))
                    <strong class="text-success">{{session()->get('success')}}</strong>
                    
                @endif

                @if (session()->has('error'))
                    <strong class="text-danger">{{session()->get('error')}}</strong>
                    
                @endif

                <form action="{{ route('update.pass') }}" method="POST">

                    @csrf
                    <br>
                    <div>
                        <label>Current Password</label>
                        <input class="form-control @error('current_password') is-invalid @enderror" value="{{old('current_password')}}" name="current_password" type="password">
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                        <label>New Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                        <label>Confirm Password</label>
                        <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" type="password">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                       
                </div>
                <br>
                
                <br>
                <button class="btn btn-primary" type="submit">Change Password</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
