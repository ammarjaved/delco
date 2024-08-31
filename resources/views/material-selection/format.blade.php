@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    

<style>
    .dropdown {
        position: relative;
    }

    .dropdown-menu {
        min-width: 200px;
        position: absolute;
        top: 100%; /* Position dropdown just below the button */
        z-index: 1050; /* Ensure it appears above other content */
    }

    .dropdown-item {
        padding: 0.5rem 1rem;
        display: flex;
        align-items: center;
    }

    .dropdown-item i {
        margin-right: 10px;
        width: 16px;
        text-align: center;
    }

    /* Additional: Prevent dropdown content from overlapping with below content */
    .dropdown-menu {
        overflow: hidden; /* Prevent any overflow */
    }

    /* Ensures the dropdown doesn't get cutoff or display other content */
    .dropdown-menu:after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background: #fff; /* Ensures no transparency issues */
        z-index: -1; /* Keep it behind the actual menu content */
    }

    .dropdown {
        position: relative;
    }

    .dropdown-menu {
        min-width: 200px;
        position: absolute;
        top: 100%; /* Position dropdown just below the button */
        z-index: 1050; /* Ensure it appears above other content */
    }

    .dropdown-item {
        padding: 0.5rem 1rem;
        display: flex;
        align-items: center;
    }

    .dropdown-item i {
        margin-right: 10px;
        width: 16px;
        text-align: center;
    }

    /* Additional: Prevent dropdown content from overlapping with below content */
    .dropdown-menu {
        overflow: hidden; /* Prevent any overflow */
    }

    /* Ensures the dropdown doesn't get cutoff or display other content */
    .dropdown-menu:after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background: #fff; /* Ensures no transparency issues */
        z-index: -1; /* Keep it behind the actual menu content */
    }
</style>

@endsection

@section('content')
<div class="container">
    <h3>Material Selection</h3>

    <div class="card">
        <div class="card-body">
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
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('material-selection.index', ['id' => $survey->id]) }}">
                                            <i class="fas fa-list-alt"></i> Add Material Selection
                                        </a>
                                        <a class="dropdown-item" href="{{ route('material-selection.show', $survey->id) }}">
                                            <i class="fas fa-eye"></i> Show Materials
                                        </a>
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
@endsection
