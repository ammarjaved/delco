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
        <h3>SAT</h3>

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
                                    <div class="dropdown" style="position: relative;">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('sat.create', $survey->id) }}"> <i class="fas fa-list-alt"></i> Add SAT</a>

                                            <a class="dropdown-item" href="{{ route('sat-attachment.index', $survey->id) }}"><i class="fa fa-paperclip"></i>Add SAT Attachments</a> 

                                            @if ($survey->ToolBoxTalkSAT)      
                                            <a class="dropdown-item" href="{{  route('SAT.toolboxtalkedit', $survey->ToolBoxTalkSAT->id) }}" > <i class="fas fa-edit"></i>Edit Toolbox</a> 
                                        @else
                                            <a class="dropdown-item" href="{{  route('SAT.toolboxtalk', $survey->id) }}"><i class="fas fa-plus"></i>Add Toolbox</a>
                                        @endif
                                        </div>
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

