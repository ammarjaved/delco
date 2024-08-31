@extends('layouts.app', ['page_title' => 'Index'])



@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<style>
.dropdown {
        position: relative;
        z-index: 1050;
    }

    .dropdown-menu {
        min-width: 200px;
        position: absolute;
        top: 100%; /* Position directly below the button */
        z-index: 1050; /* Higher z-index to appear above other elements */
        padding: 0.5rem 0; /* Space around items */
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); /* Add a shadow for better visibility */
    }

    .dropdown-item {
        padding: 0.5rem 1rem;
        display: flex;
        align-items: center;
        white-space: nowrap; /* Prevent text wrapping */
    }

    .dropdown-item i {
        margin-right: 10px;
        width: 16px;
        text-align: center;
    }

    .dropdown-divider {
        margin: 0.5rem 0;
    }

    /* Ensure buttons inside forms take full width */
    form .dropdown-item {
        width: 100%;
        text-align: left;
    }

</style>

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
                    <div class="card" style="background-color:#E0EEE0;">
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
                                                <div class="dropdown" style="position: absolute; z-index: 10000">
                                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                    
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            @if ($survey->PreCabling)
                                                                <a class="dropdown-item" href="{{  route('pre-cabling.edit', $survey->PreCabling->id) }}" >Edit PIW</a>
                                                            @else
                                                                <a class="dropdown-item" href="{{  route('pre-cabling-piw.create',$survey) }}" >Add PIW</a>

                                                            @endif
                                                            @if ($survey->PreCablingShutDown)
                                                                <a class="dropdown-item" href="{{  route('pre-cabling-shut-down.edit', $survey->PreCablingShutDown->id) }}" >Edit Per-ShutDown</a>
                                                            @else
                                                                <a class="dropdown-item" href="{{  route('pre-cabling-shut-down.create',$survey) }}" >Add Pre-ShutDown</a>
                                                            @endif
                                                                <a class="dropdown-item" href="{{  route('pre-cabling-attachment.index', $survey->id) }}" >  Add PreCabling Attactments</a> 
                                                                <a class="dropdown-item" href="{{  route('pre-cabling-image.index', $survey->id) }}" >  Add PreCabling Images</a> 
                                                                @if ($survey->ToolBoxTalk)    
                                                                <a class="dropdown-item" href="{{  route('PreCabling.toolboxtalkedit', $survey->ToolBoxTalk->id) }}" >  </i>Toolbox</a> 
                                                            @else
                                                                <a class="dropdown-item" href="{{  route('PreCabling.toolboxtalk', $survey->id) }}">Add Toolbox</a>
                                                            @endif
                                                        </div>
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
