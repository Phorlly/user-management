@extends('layouts.app')

@section('content')
    <section class="section mt-4">
        <div class="pagetitle mb-2">
            <h1 class="title text-center">Modify Module Exist</h1>
        </div>

        @include('partials._message')

        <form action="{{ route('modules.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-12">
                    @include('partials._input', [
                        'name' => 'text',
                        'label' => 'Module Name',
                        'value' => $item->text,
                    ])
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="route">Route Name</label>
                        <select name="route" class="form-control" required>
                            <option value="">---Select Route---</option>
                            @foreach ($routes as $route)
                                @if (getLast($route['name']) == 'index')
                                    <option value="{{ $route['name'] }}"
                                        {{ $route['name'] == $item->name ? 'selected' : '' }}>{{ $route['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('partials._input', [
                        'name' => 'icon',
                        'label' => 'Class Icon',
                        'value' => $item->icon,
                    ])
                </div>
            </div>

            <div class="footer row justify-content-center">
                <a href="{{ route('modules.index') }}" class="mx-3 btn btn-dark w-25">
                    <i class="ri-arrow-go-back-fill"></i>
                    <span>Back</span>
                </a>
                <button type="submit" class="btn btn-success w-25">
                    <span>Go</span>
                    <i class="ri-send-plane-2-fill"></i>
                </button>
            </div>
        </form>
    </section>
@endsection
