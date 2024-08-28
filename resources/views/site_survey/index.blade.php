@extends('layouts.app', ['page_title' => 'Index'])
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    
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
                    {{ Session::get('success') }}
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
                        <!-- Button group with spacing -->
                        <div class="btn-toolbar" role="toolbar">
                            <div class="btn-group mr-2" role="group" aria-label="Primary Actions">
                                <!-- Show Button -->
                                <a href="{{ route('site_survey.show', $survey) }}" class="btn btn-success">
                                    <i class="fas fa-eye"></i> Show
                                </a>
                        
                                <!-- Edit Button -->
                                <a href="{{ route('site_survey.edit', $survey) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </div>
                        
                            {{-- <div class="btn-group mr-2" role="group" aria-label="Secondary Actions">
                                <!-- Material Selection Button -->
                                <a href="{{ route('material-selection.index', ['id' => $survey->id]) }}" class="btn btn-secondary">
                                    <i class="fas fa-list-alt"></i> Material Selection
                                </a>


                                
                        
                                <!-- Show Material Selection Button -->
                                <a href="{{ route('material-selection.show', $survey->id) }}" class="btn btn-secondary">
                                    <i class="fas fa-eye"></i> Show Materials
                                </a>
                            </div> --}}
                        
                            <div class="btn-group" role="group" aria-label="Delete Actions">
                                <!-- Delete Site Survey Button -->
                                <form action="{{ route('site_survey.destroy', $survey->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Site Survey?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> Delete Site Survey
                                    </button>
                                </form>
                            
                                <!-- Delete Materials Button -->
                                {{-- <form action="{{ route('material-selection.destroy', $survey->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete materials for this Site Survey?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ml-2">
                                        <i class="fas fa-trash"></i> Delete Materials
                                    </button>
                                </form> --}}
                            </div>
                            
                            <!-- Add margin-left to the Upload Files link -->
                            <a href="{{ route('siteFileUploadView.index', ['id' => $survey->id]) }}" class="btn btn-secondary ml-3">
                                <i class="fas fa-eye"></i> Upload Files
                            </a>
                            
                            
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