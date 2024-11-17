@extends('layouts.auth')

@section('content')
    <form action="{{ route('logup') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="text-uppercase">Sign Up</h1>

        @include('partials._message')

        <fieldset>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Full Name*:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="Full Name" required>
                    </div>
                </div>

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

                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary text-uppercase">Sign Up</button>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <p class="small mb-0">Have account already?
                        <a href="{{ route('in') }}"> Login with your account</a>
                    </p>
                </div>
            </div>
        </fieldset>
    </form>
@endsection