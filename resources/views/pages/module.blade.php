@extends('layouts.app')

@section('content')
    <section class="section mt-4">
        <div class="pagetitle mb-2">
            <div class="row">
                <div class="col-md-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Module</li>
                    </ol>
                </div>

                <div class="col-md-6 text-center">
                    <h1 class="text-dark text-uppercase">Modules List</h1>
                </div>

                <div class="col-md-3">
                    @if (accessable('modules.create'))
                        <a href="{{ route('modules.create') }}" class="btn btn-primary btn-sm">
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
                        <table class="table datatable table-striped table-hover table-responsive-lg">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <b>N</b>o
                                    </th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Route</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->text }}</td>
                                        <td>
                                            <i class=" {{ $item->icon }}"></i>
                                            <span>{{ $item->icon }}</span>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            {{ $item->created_at->setTimezone('Asia/Bangkok')->format('d M y, g:i A') }}
                                        </td>
                                        <td>
                                            {{ $item->updated_at->setTimezone('Asia/Bangkok')->format('d M y, g:i A') }}
                                        </td>
                                        <td>
                                            @if ($item->module != 'module')
                                                <!-- Buttons -->
                                                @include('partials._button', [
                                                    'item' => $item,
                                                    'view' => 'modules.show',
                                                    'modify' => 'modules.edit',
                                                    'trash' => 'modules.destroy',
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
