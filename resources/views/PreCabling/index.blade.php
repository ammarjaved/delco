@extends('layouts.app', ['page_title' => 'Index'])
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid  ">
            <div class="row mb-2" style="flex-wrap:nowrap">
                <div class="col-sm-6">
                    <h3>Pre Cabling</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <ol class="breadcrumb float-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">index</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @if (Session::has('failed'))
                <div class="alert {{ Session::get('alert-class', 'alert-secondary') }}" role="alert">
                    {{ Session::get('failed') }}

                    <button type="button" class="close border-0 bg-transparent" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert {{ Session::get('alert-class', 'alert-success') }}" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close border-0 bg-transparent" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Pre Cabling</h3>
                                {{-- <a href="{{ route('site_survey.create') }}" class="btn  btn-sm"
                                    style="background-color: #367FA9; border-radius:0px; color:white">Add new</a> --}}
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="text-right mb-4">

                            </div>
                            <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama PE</th>
                                            <th>Kawasan</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($surveys as $survey)
                                            <tr>
                                                <td>{{ $survey->id }}</td>
                                                <td>{{ $survey->nama_pe }}</td>
                                                <td>{{ $survey->kawasan }}</td>
                                                <td>
                                                    <!-- Button group with spacing -->
                                                    <div class="btn-group" role="group" aria-label="Action Buttons">
                                                        <!-- Show Button -->
                                                        <div class="mx-2">
                                                            @if ($survey->PreCabling)
                                                                <a href="{{  route('pre-cabling.edit', $survey->PreCabling->id) }}" class="btn btn-primary">Show PIW</a>
                                                            @else
                                                                <a href="{{  route('pre-cabling-piw.create',$survey) }}" class="btn btn-success">Add PIW</a>

                                                            @endif
                                                        </div>

                                                        <div class="mx-2">
                                                            @if ($survey->PreCablingShutDown)
                                                                <a href="{{  route('pre-cabling-shut-down.edit', $survey->PreCablingShutDown->id) }}" class="btn btn-primary">ShutDown</a>
                                                            @else
                                                                <a href="{{  route('pre-cabling-shut-down.create',$survey) }}" class="btn btn-success">Add ShutDown</a>
                                                            @endif
                                                        </div>
                                                        

                                                        <!-- Edit Button with margin-left -->
                                                        {{-- <a href="{{ route('site_survey.edit', $survey) }}"
                                                            class="btn btn-primary ml-2">Edit</a> --}}



                                                        <!-- Delete Button with margin-left -->
                                                       
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>
@endsection
