@extends('layouts.app')

@section('content')
    <section class="section mt-4">
        <div class="pagetitle mb-2">
            <h1 class="title text-center">Assign Permission to Route</h1>
        </div>

        @include('partials._message')

        <form action="{{ route('permission-routes.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="permission">Assign Permission</label>
                        <select name="permission" class="form-control" required>
                            <option value="">---Select Permission---</option>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="route">To Route</label>
                        <select name="route" class="form-control" required>
                            <option value="">---Select Route---</option>
                            @foreach ($routes as $route)
                                <option value="{{ $route['name'] }}">{{ $route['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="footer row justify-content-center">
                <a href="{{ route('permission-routes.index') }}" class="mx-3 btn btn-dark w-25">
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
