@extends('layouts.app')

@section('content')
    <section class="section mt-4">
        <div class="pagetitle mb-2">
            <div class="row">
                <div class="col-md-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>

                <div class="col-md-6 text-center">
                    <h1 class="text-dark text-uppercase">Users List</h1>
                </div>

                <div class="col-md-3">
                    @if (accessable('users.create'))
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role As</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role->name }}</td>
                                        <td>
                                            {{ $item->created_at->setTimezone('Asia/Bangkok')->format('d M y, g:i A') }}
                                        </td>
                                        <td>
                                            {{ $item->updated_at->setTimezone('Asia/Bangkok')->format('d M y, g:i A') }}
                                        </td>
                                        <td>
                                            @if ($item->user != 'user')
                                                <!-- Buttons -->
                                                @include('partials._button', [
                                                    'item' => $item,
                                                    'view' => 'users.show',
                                                    'modify' => 'users.edit',
                                                    'trash' => 'users.destroy',
                                                ])
                                                <!-- End Buttons -->
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table> <!-- End Table with stripped rows -->
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
