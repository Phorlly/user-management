@extends('layouts.app')

@section('content')
    <section class="section mt-4">
        <div class="pagetitle mb-2">
            <h1 class="title text-center">Create New Role</h1>
        </div>

        @include('partials._message')

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    @include('partials._input', ['name' => 'name', 'label' => 'Name'])
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Description">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="footer row justify-content-center">
                <a href="{{ route('roles.index') }}" class="mx-3 btn btn-dark w-25">
                    <i class="ri-arrow-go-back-fill"></i>
                    <span>Back</span>
                </a>
                <button type="submit" class="btn btn-primary w-25">
                    <span>Go</span>
                    <i class="ri-send-plane-2-fill"></i>
                </button>
            </div>
        </form>
    </section>
@endsection
