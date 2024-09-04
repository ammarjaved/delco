@extends('layouts.app', ['page_title' => 'Upload Files'])

@section('content')
<div class="container mt-3"> <!-- Adjusted margin-top to reduce space at the top -->
    <h3 class="mb-3">Upload Files for SAT #{{ $siteSurvey->id }} (Nama PE: {{ $siteSurvey->nama_pe }})</h3> <!-- Reduced bottom margin -->

    <div class="mb-4">
        <form action="{{ route('sat-attachments.store', ['id' => $siteSurvey->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="site_file" class="form-label">Upload Your File</label>
                    <input type="file" id="site_file" name="site_file" class="form-control" accept="image/*" required>
                </div> 
                <div class="col-md-6 mb-2" >
                    <label for="description" class="form-label">Description</label>
                    <textarea style="height: 41px;" id="description" name="description" class="form-control" rows="3" required></textarea>
                </div>
                <button style="    height: 40px;margin-top: 30px;" type="submit" class="btn btn-primary">Upload</button>
            </div>
            
        </form>
    </div>

    <h4 class="mt-4">Uploaded Files</h4> <!-- Adjusted top margin -->
    @if ($files->isEmpty())
        <div class="alert alert-warning" role="alert">
            No files uploaded yet.
        </div>
    @else
       
    <table id="myTable" class="table table-bordered table-hover data-table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama PE</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $index => $file)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $siteSurvey->nama_pe }}</td>
                            <td><a href="{{ asset($file->file_path) }}" target="_blank">{{ $file->file_name }}</a></td>
                            <td>{{ $file->description }}</td>
                            <td>
                                <a href="{{ asset($file->file_path) }}" target="_blank" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> view
                                </a>
                                <form action="{{ route('sat-attachments.destroy', $file->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this file?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
    @endif
</div>
@endsection



<style>

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


