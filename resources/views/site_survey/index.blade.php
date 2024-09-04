@extends('layouts.app', ['page_title' => 'Index'])
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <style>
        /* Ensure the dropdown menu is positioned correctly and above other content */
        .dropdown {
            position: relative;
        }
    
        .dropdown-menu {
            min-width: 200px;
            position: absolute;
            top: 100%; /* Position directly below the button */
            left: auto;
            right: 0; /* Align right */
            z-index: 1050; /* Higher z-index to appear above other elements */
            padding: 0.5rem 0; /* Space around items */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); /* Add a shadow for better visibility */
            background-color: #fff; /* Ensure the background is white */
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
    
        /* Prevent overflow from other content */
        body {
            overflow-x: hidden;
        }
    
        .dropdown-menu-right {
            right: 0;
            left: auto;
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
                    <h3>Site Data</h3>
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
                    {{Session::get('success') }}
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
                                <a href="{{ route('site_survey.create') }}" class="btn  btn-sm"
                                    style="background-color: #367FA9; border-radius:0px; color:white">Add new</a>
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
            @foreach($surveys as $survey)
                <tr>
                    <td>{{ $survey->id }}</td>
                    <td>{{ $survey->nama_pe }}</td>
                    <td>{{ $survey->kawasan }}</td>
                    <td class="text-center">
                        <button type="button" class="btn  " data-toggle="dropdown">
                            <img
                                src="{{ URL::asset('assets/web-images/three-dots-vertical.svg') }}">
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{ route('site_survey.show', $survey) }}">
<i class="fas fa-eye"></i> Show
</a>
                            <a class="dropdown-item" href="{{ route('site_survey.edit', $survey) }}">
<i class="fas fa-edit"></i> Edit
</a>
<a class="dropdown-item" href="{{ route('siteFileUploadView.index', ['id' => $survey->id]) }}">
<i class="fas fa-paperclip"></i> Attach Files


</a>
<div class="dropdown-divider"></div>
<form action="{{ route('site_survey.destroy', $survey->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Site Survey?');" style="display:inline;">
@csrf
@method('DELETE')
<button type="submit" class="dropdown-item text-danger">
<i class="fas fa-trash-alt"></i> Delete Site Survey
</button>
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
</div>
</div>  


</section> 



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

