@extends('layouts.app')

@section('content')
    <section class="section mt-4">
        <div class="pagetitle mb-2">
            <div class="row">
                <div class="col-md-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard </li>
                    </ol>
                </div>

                <div class="col-md-6 text-center">
                    <h1 class="text-dark text-uppercase">Dashboard List</h1>
                </div>

                <div class="col-md-3">
                    <button type="button" class="btn btn-primary btn-sm">
                        <i class="ri-add-circle-fill"></i>
                        <span class="text-uppercase text-white">Add</span>
                    </button>
                    {{-- <button type="button" class="btn btn-danger btn-sm">
                        <i class="ri-refresh-line"></i>
                        <span class="text-uppercase text-white">Reload</span>
                    </button> --}}
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Show loading -->
        <div id="waiting"></div>

        <div class="row align-items-top">
            <div class="col-md-12">
                <div class="card shadow-lg rounded-lg">
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        <b>N</b>ame
                                    </th>
                                    <th>Ext.</th>
                                    <th>City</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                                    <th>Completion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Unity Pugh</td>
                                    <td>9958</td>
                                    <td>Curicó</td>
                                    <td>2005/02/11</td>
                                    <td>37%</td>
                                </tr>
                                <tr>
                                    <td>Theodore Duran</td>
                                    <td>8971</td>
                                    <td>Dhanbad</td>
                                    <td>1999/04/07</td>
                                    <td>97%</td>
                                </tr>
                                <tr>
                                    <td>Kylie Bishop</td>
                                    <td>3147</td>
                                    <td>Norman</td>
                                    <td>2005/09/08</td>
                                    <td>63%</td>
                                </tr>
                                <tr>
                                    <td>Willow Gilliam</td>
                                    <td>3497</td>
                                    <td>Amqui</td>
                                    <td>2009/29/11</td>
                                    <td>30%</td>
                                </tr>
                                <tr>
                                    <td>Blossom Dickerson</td>
                                    <td>5018</td>
                                    <td>Kempten</td>
                                    <td>2006/11/09</td>
                                    <td>17%</td>
                                </tr>
                                <tr>
                                    <td>Elliott Snyder</td>
                                    <td>3925</td>
                                    <td>Enines</td>
                                    <td>2006/03/08</td>
                                    <td>57%</td>
                                </tr>
                                <tr>
                                    <td>Castor Pugh</td>
                                    <td>9488</td>
                                    <td>Neath</td>
                                    <td>2014/23/12</td>
                                    <td>93%</td>
                                </tr>
                                <tr>
                                    <td>Pearl Carlson</td>
                                    <td>6231</td>
                                    <td>Cobourg</td>
                                    <td>2014/31/08</td>
                                    <td>100%</td>
                                </tr>
                                <tr>
                                    <td>Deirdre Bridges</td>
                                    <td>1579</td>
                                    <td>Eberswalde-Finow</td>
                                    <td>2014/26/08</td>
                                    <td>44%</td>
                                </tr>
                                <tr>
                                    <td>Deirdre Bridges</td>
                                    <td>1579</td>
                                    <td>Eberswalde-Finow</td>
                                    <td>2014/26/08</td>
                                    <td>44%</td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

