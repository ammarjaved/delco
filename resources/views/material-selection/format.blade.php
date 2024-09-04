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

    .dataTables_filter {
    float: right !important;
}
.dataTables_paginate {
    float: right !important;
}
.dataTables_length {
    float: left !important;
}
.dataTables_info {
    float: left !important;
}

table.dataTable thead .sorting,
table.dataTable thead .sorting_asc,
table.dataTable thead .sorting_desc {
    cursor: pointer;
    position: relative;
}

table.dataTable thead .sorting:after,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_desc:after {
    position: absolute;
    bottom: 8px;
    right: 8px;
    display: block;
    font-family: 'Font Awesome 5 Free';
    opacity: 0.5;
}

table.dataTable thead .sorting:after {
    content: "\f0dc";
    opacity: 0.2;
}

table.dataTable thead .sorting_asc:after {
    content: "\f0de";
}

table.dataTable thead .sorting_desc:after {
    content: "\f0dd";
}

</style>

@endsection

@section('content')
<div class="container">
    <h3>Material Selection</h3>

    <div class="card" style="background-color:#E0EEE0;">
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-hover data-table">

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
                                        <form  class="dropdown-item"  action="{{ route('material-selection.delete-all', $survey->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete all items for this Site Survey?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class="fas fa-trash"></i> Delete Material</button>
                                        </form>

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




@section('script')

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/generate-qr.js') }}"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>

<script>



document.addEventListener('DOMContentLoaded', function() {
table = $('.data-table').DataTable({

    dom: '<"row"<"col-sm-6"l><"col-sm-6 text-right"f>>' +
         '<"row"<"col-sm-12"tr>>' +
         '<"row"<"col-sm-5"i><"col-sm-7 text-right"p>>',
    language: {
        search: "",
        searchPlaceholder: "Search..."

    },

    // ordering: true,
    // order: [[0, 'asc']], // Sort by the first column (index 0) in ascending order by default
    // columnDefs: [
    //     { orderable: false, targets: [4] } // Disable sorting on the SAT column (index 4)
    // ]

               
               
})
})

</script>


@endsection
