@extends('layouts.app', ['page_title' => 'Upload Files'])

@section('content')
<div class="container mt-3"> <!-- Adjusted margin-top to reduce space at the top -->
    <h3 class="mb-3">Upload Files for Pre Cabling #{{ $siteSurvey->id }} (Nama PE: {{ $siteSurvey->nama_pe }})</h3> <!-- Reduced bottom margin -->

    <div class="mb-4">
        <form action="{{ route('pre-cabling-attachments.store', ['id' => $siteSurvey->id]) }}" method="POST" enctype="multipart/form-data">
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
        <div class="table-responsive">
            <table class="table table-bordered table-hover mt-4">
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
                                <form action="{{ route('pre-cabling-attachments.destroy', $file->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this file?');">
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
        </div>
    @endif
</div>
@endsection
