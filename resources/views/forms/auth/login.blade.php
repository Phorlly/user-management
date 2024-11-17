@extends('layouts.auth')

@section('content')
    <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="text-uppercase">Sign In</h1>

        @include('partials._message')

        <fieldset>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="mail">Email*:</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                            placeholder="Email address" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Password*:</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-check-inline">
                        <input type="checkbox" class="form-check-input" name="remember">
                        <label for="remember">Remember Me</label>
                    </div>
                </div>

                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success text-uppercase">Sign In</button>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <p class="small mb-0">Don't have account?
                        <a href="{{ route('up') }}">Create an account</a>
                    </p>
                </div>
            </div>
        </fieldset>
    </form>
@endsection
