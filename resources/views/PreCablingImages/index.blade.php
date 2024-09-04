@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Image PreCabling</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Form to Add Image Shutdown -->
                        <form action="{{ route('pre-cabling-images.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="site_survey_id" value="{{ $survey->id }}">
                            
                            <div class="form-group row">
                                <!-- Image Name -->
                                <div class="col-md-4">
                                    <label for="image_name">Image Name</label>
                                    <select class="form-control" id="image_name" name="image_name" required>
                                        <option value="" disabled selected>Select an image name</option>
                                        <option value="RCB">RCB</option>
                                        <option value="RCB-2">RCB-2</option>
                                        <option value="RCB-SERIAL-NUMBER">RCB-SERIAL-NUMBER</option>
                                        <option value="RCB-SERIAL-NUMBER-2">RCB-SERIAL-NUMBER-2</option>
                                        <option value="TERMINATION-OF-RCB">TERMINATION-OF-RCB</option>
                                        <option value="TERMINATION-OF-RCB-2">TERMINATION-OF-RCB-2</option>
                                        <option value="SCADA-CABLE-ROUTE">SCADA-CABLE-ROUTE</option>
                                        <option value="SCADA-CABLE-ROUTE-2">SCADA-CABLE-ROUTE-2</option>
                                        <option value="BATTERY-CHARGER">BATTERY-CHARGER</option>
                                        <option value="BATTERY-CHARGER-2">BATTERY-CHARGER-2</option>
                                        <option value="PLATE-BATTERY-CHARGER">PLATE-BATTERY-CHARGER</option>
                                        <option value="PLATE-BATTERY-CHARGER-2">PLATE-BATTERY-CHARGER-2</option>
                                        <option value="EFI">EFI</option>
                                        <option value="EFI-2">EFI-2</option>
                                        <option value="EFI-SERIAL-NUMBER">EFI-SERIAL-NUMBER</option>
                                        <option value="EFI-SERIAL-NUMBER-2">EFI-SERIAL-NUMBER-2</option>
                                        <option value="RTU">RTU</option>
                                        <option value="RTU-2">RTU-2</option>
                                        <option value="RTU-BRAND">RTU-BRAND</option>
                                        <option value="RTU-BRAND-2">RTU-BRAND-2</option>
                                    </select>
                                </div>
                                

                                <div class="col-md-4">
                                    <label for="image_desc">Image Description</label>
                                    <input type="text" class="form-control" id="image_desc" name="image_desc"   required>
                                </div>
                                <!-- Upload Image -->
                                <div class="col-md-4">
                                    <label for="image_url">Upload Image</label>
                                    <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" required>
                                </div>

                                

                                <!-- Image Type -->
                                {{-- <div class="col-md-4">
                                    <label for="image_type">Image Type</label>
                                    <select class="form-control" id="image_type" name="image_type" required>
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="before">Before</option>
                                        <option value="during">During</option>
                                        <option value="after">After</option>
                                    </select>
                                </div> --}}
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <button type="submit" class="btn btn-success mt-3">Save</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Cancel</a>
                        </form>

                        <!-- Table of Saved Image Shutdowns -->
                        <h3 class="mt-4">Saved Image PreCabling</h3>
                        @if($imageShutdowns->isEmpty())
                            <p>No image shutdowns found for this survey.</p>
                        @else
                            
                        <table id="myTable" class="table table-bordered table-hover data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image Name</th>
                                            <th>Image Description</th>
                                            <th>Image Preview</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($imageShutdowns as $imageShutdown)
                                            <tr>
                                                <td>{{ $imageShutdown->id }}</td>
                                                <td>{{ $imageShutdown->image_name }}</td>
                                                <td>{{ $imageShutdown->image_desc }}</td>
                                                <td>
                                                    @if($imageShutdown->image_url)
                                                    <a href="{{ asset($imageShutdown->image_url) }}" target="_blank" class="btn btn-info btn-sm">
                                                        View
                                                    </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('pre-cabling-images.edit', $imageShutdown->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('pre-cabling-images.destroy', $imageShutdown->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                           
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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

