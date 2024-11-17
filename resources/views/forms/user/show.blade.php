@extends('layouts.app')

@section('content')
    <section class="section mt-4">
        <div class="pagetitle mb-2">
            <h1 class="title text-center">View User Exist</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('partials._input', [
                    'name' => 'name',
                    'label' => 'Full Name',
                    'value' => $item->name,
                    'readonly' => 'readonly',
                ])
            </div>
            <div class="col-md-12">
                @include('partials._input', [
                    'name' => 'email',
                    'label' => 'Email Address',
                    'type' => 'email',
                    'value' => $item->email,
                    'readonly' => 'readonly',
                ])
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="role">With Role</label>
                    <select name="role" class="form-control" disabled>
                        <option value="">---Select Role---</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $role->id == $item->role->id ? 'selected' : '' }}>
                                {{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="footer row justify-content-center">
            <a href="{{ route('users.index') }}" class="mx-3 btn btn-dark w-25">
                <i class="ri-arrow-go-back-fill"></i>
                <span>Back</span>
            </a>
        </div>
    </section>
@endsection
