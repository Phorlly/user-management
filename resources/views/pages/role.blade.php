@extends('layouts.app')

@section('content')
    <section class="section mt-4">
        <div class="pagetitle mb-2">
            <div class="row">
                <div class="col-md-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Role</li>
                    </ol>
                </div>

                <div class="col-md-6 text-center">
                    <h1 class="text-dark text-uppercase">Roles List</h1>
                </div>

                <div class="col-md-3">
                    @if (accessable('roles.create'))
                        <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">
                            <i class="ri-add-circle-fill"></i>
                            <span class="text-uppercase text-white">Add</span>
                        </a>
                    @endif
                    {{-- <button type="button" class="btn btn-danger btn-sm">
                    <i class="ri-refresh-line"></i>
                    <span class="text-uppercase text-white">Reload</span>
                </button> --}}
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

                        {{-- <form action="{{ route('roles.delete') }}" method="POST">
                    @csrf
                    @method('DELETE') --}}

                        <!-- Table with stripped rows -->
                        <table class="table datatable table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <b>N</b>o
                                    </th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        {{-- <td><input type="checkbox" name="ids[]" value="{{ $item->id }}"></td> --}}
                                        <td scope="row">{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            {{ $item->created_at->setTimezone('Asia/Bangkok')->format('d M y, g:i A') }}
                                        </td>
                                        <td>
                                            {{ $item->updated_at->setTimezone('Asia/Bangkok')->format('d M y, g:i A') }}
                                        </td>
                                        <td>
                                            @if ($item->role != 'user')
                                                <!-- Buttons -->
                                                @include('partials._button', [
                                                    'item' => $item,
                                                    'view' => 'roles.show',
                                                    'modify' => 'roles.edit',
                                                    'trash' => 'roles.destroy',
                                                ])
                                                <!-- End Buttons -->
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{-- <tfoot>
                                <button type="submit" class="btn btn-dark btn-sm mb-2">
                                    <i class="ri-delete-bin-2-fill"></i>
                                    <span>Delete Selected</span>
                                </button>
                            </tfoot> --}}
                        </table>
                        <!-- End Table with stripped rows -->

                        {{-- </form> --}}
                    </div>
                </div>

            </div>
        </div>

        <!-- Import partial view -->
        {{-- @include("partials._confirm") --}}

    </section>
@endsection
@push('scripts')
    <script>
        // Your JavaScript code goes here
    </script>
@endpush
