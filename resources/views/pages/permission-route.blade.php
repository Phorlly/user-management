@extends('layouts.app')

@section('content')
    <section class="section mt-4">
        <div class="pagetitle mb-2">
            <div class="row">
                <div class="col-md-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Permission-Routes</li>
                    </ol>
                </div>

                <div class="col-md-6 text-center">
                    <h1 class="text-dark text-uppercase">Permission-Route List</h1>
                </div>

                <div class="col-md-3">
                    @if (accessable('permission-routes.create'))
                        <a href="{{ route('permission-routes.create') }}" class="btn btn-primary btn-sm">
                            <i class="ri-add-circle-fill"></i>
                            <span class="text-uppercase text-white">Add</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Alert Message -->
        @include('partials._message')

        <div class="row align-items-top">
            <div class="col-md-12">
                <div class="card shadow-lg rounded-lg">
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table datatable table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <b>N</b>o
                                    </th>
                                    <th scope="col">Permission</th>
                                    <th scope="col">Accessable</th>
                                    <th scope="col">As Route</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->permission->name }}</td>
                                        <td>{{ $item->permission->description }}</td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            <!-- Buttons -->
                                            @include('partials._button', [
                                                'item' => $item,
                                                'view' => 'permission-routes.show',
                                                'modify' => 'permission-routes.edit',
                                                'trash' => 'permission-routes.destroy',
                                            ])
                                            <!-- End Buttons -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
