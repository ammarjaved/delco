@extends('layouts.app', ['page_title' => 'Index'])
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <style>
        /* Ensure the dropdown menu is positioned correctly and above other content */
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
        <div class="container-fluid" style="z-index:1">
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
                    <div class="card">
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
            @foreach($surveys as $survey)
                <tr>
                    <td>{{ $survey->id }}</td>
                    <td>{{ $survey->nama_pe }}</td>
                    <td>{{ $survey->kawasan }}</td>
                    <td>
                        <div class="dropdown"style="z-index:10000000">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    $('.dropdown').on('show.bs.dropdown', function() {
                var $button = $(this).find('.dropdown-toggle');
                var $menu = $(this).find('.dropdown-menu');
                
                var buttonOffset = $button.offset();
                var buttonHeight = $button.outerHeight();
                var menuHeight = $menu.outerHeight();
                
                var spaceBelow = $(window).height() - buttonOffset.top - buttonHeight;
                var spaceAbove = buttonOffset.top;
                
                if (spaceBelow < menuHeight && spaceAbove > spaceBelow) {
                    $menu.css({
                        'top': 'auto',
                        'bottom': buttonHeight + 'px'
                    }).addClass('dropdown-menu-up');
                } else {
                    $menu.css({
                        'top': '',
                        'bottom': ''
                    }).removeClass('dropdown-menu-up');
                }
            });
        });
    </script>