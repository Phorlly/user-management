@extends('layouts.app')

@section('content')
    <section class="section mt-4">
        <div class="pagetitle mb-2">
            <h1 class="title text-center">View Permission to Roles Exist</h1>
        </div>

        @include('partials._message')

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="permission">Assign Permission</label>
                    <select name="permission" class="form-control" disabled>
                        <option value="">Select Permission</option>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}" {{ $permission->id == $item->id ? 'selected' : '' }}>
                                {{ $permission->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="roles">To Roles</label>
                    <select name="roles[]" id="roles" disabled class="form-control" multiple>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $item->roles->contains($role->id) ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="footer row justify-content-center">
            <a href="{{ route('permission-roles.index') }}" class="mx-3 btn btn-dark w-25">
                <i class="ri-arrow-go-back-fill"></i>
                <span>Back</span>
            </a>
        </div>
    </section>
@endsection
