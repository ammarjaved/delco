@extends('layouts.app', ['page_title' => 'Index'])



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
                                                    <div class="dropdown" style="position: relative;">
                                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            @if ($survey->PreCabling)
                                                                <a class="dropdown-item" href="{{ route('pre-cabling.edit', $survey->PreCabling->id) }}"><i class="fa fa-edit"></i>Edit PIW</a>
                                                            @else
                                                                <a class="dropdown-item" href="{{ route('pre-cabling-piw.create', $survey) }}"><i class="fa fa-plus"></i>Add PIW</a>
                                                            @endif
                                                
                                                            @if ($survey->PreCablingShutDown)
                                                                <a class="dropdown-item" href="{{ route('pre-cabling-shut-down.edit', $survey->PreCablingShutDown->id) }}"><i class="fa fa-edit"></i>Edit Pre-ShutDown</a>
                                                            @else
                                                                <a class="dropdown-item" href="{{ route('pre-cabling-shut-down.create', $survey) }}"><i class="fa fa-plus"></i>Add Pre-ShutDown</a>
                                                            @endif
                                                
                                                            <a class="dropdown-item" href="{{ route('pre-cabling-attachment.index', $survey->id) }}"><i class="fa fa-paperclip"></i>Add PreCabling Attachments</a> 
                                                            <a class="dropdown-item" href="{{ route('pre-cabling-image.index', $survey->id) }}"><i class="fa fa-image"></i>Add PreCabling Images</a> 
                                                
                                                            @if ($survey->ToolBoxTalk)    
                                                                <a class="dropdown-item" href="{{ route('PreCabling.toolboxtalkedit', $survey->ToolBoxTalk->id) }}"><i class="fa fa-edit"></i>Edit Toolbox</a> 
                                                            @else
                                                                <a class="dropdown-item" href="{{ route('PreCabling.toolboxtalk', $survey->id) }}"><i class="fa fa-plus"></i>Add Toolbox</a>  
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


<script>
$(document).ready(function() {
    $('.dropdown-toggle').on('click', function(e) {
        e.preventDefault();

        // Close all open dropdowns
        $('.dropdown-menu').removeClass('show');

        // Open the clicked dropdown
        $(this).next('.dropdown-menu').toggleClass('show');
    });

    // Close the dropdown if clicked outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.dropdown').length) {
            $('.dropdown-menu').removeClass('show');
        }
    });
});

</script>






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
