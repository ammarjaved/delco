@extends('layouts.app', ['page_title' => 'Upload Files'])

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Upload Files for Site Survey #{{ $siteSurvey->id }} (Nama PE: {{ $siteSurvey->nama_pe }})</h3>

    <form action="{{ route('siteFileUpload.storeViewFiles', ['id' => $siteSurvey->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="site_file" class="form-label">Upload Your File</label>
            <input type="file" id="site_file" name="site_file" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <h4 class="mt-5">Uploaded Files</h4>
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
                        <th scope="col">Nama PE</th> <!-- Nama PE Column -->
                        <th scope="col">File Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $index => $file)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $siteSurvey->nama_pe }}</td> <!-- Displaying Nama PE -->
                            <td><a href="{{ asset($file->file_path) }}" target="_blank">{{ $file->file_name }}</a></td>
                            <td>{{ $file->description }}</td>
                            <td>
                                <a href="{{ asset($file->file_path) }}" target="_blank" class="btn btn-info btn-sm">
                                    <i class="fas fa-download"></i> Download
                                </a>
                                <form action="{{ route('siteFileUpload.destroy', $file->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this file?');">
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
