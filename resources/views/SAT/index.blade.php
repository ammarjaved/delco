@extends('layouts.app')


@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    
    

<style>
.dropdown {
    position: relative; /* Ensure this is correct for your layout */
}

.dropdown-menu {
    min-width: 200px;
    position: absolute;
    top: 100%; /* Position dropdown just below the button */
    left: 0; /* Aligns dropdown menu with the left edge of the button */
    z-index: 1050; /* Ensure it appears above other content */
    background: #fff; /* Ensure the dropdown background is solid */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Add a shadow for better visibility */
    border-radius: 4px; /* Optional: Add rounded corners for a better look */
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

</style>

@endsection


@section('content')
    <div class="container">
        <h3>SAT</h3>

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
                                    <div class="dropdown" style="position: relative;">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('sat.create', $survey->id) }}"> <i class="fas fa-list-alt"></i> Add SAT</a>
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
