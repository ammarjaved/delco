@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Image Shutdown</h1>
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
                        <form action="{{ route('image-shutdown.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="site_survey_id" value="{{ $survey->id }}">
                            
                            <div class="form-group row">
                                <!-- Image Name -->
                                <div class="col-md-4">
                                    <label for="image_name">Image Name</label>
                                    <input type="text" class="form-control" id="image_name" name="image_name" required>
                                </div>

                                <!-- Upload Image -->
                                <div class="col-md-4">
                                    <label for="image_url">Upload Image</label>
                                    <input type="file" class="form-control" id="image_url" name="image_url" required>
                                </div>

                                <!-- Image Type -->
                                <div class="col-md-4">
                                    <label for="image_type">Image Type</label>
                                    <select class="form-control" id="image_type" name="image_type" required>
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="before">Before</option>
                                        <option value="during">During</option>
                                        <option value="after">After</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <button type="submit" class="btn btn-success mt-3">Save</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Cancel</a>
                        </form>

                        <!-- Table of Saved Image Shutdowns -->
                        <h3 class="mt-4">Saved Image Shutdowns</h3>
                        @if($imageShutdowns->isEmpty())
                            <p>No image shutdowns found for this survey.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mt-3">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image Name</th>
                                            <th>Image Type</th>
                                            <th>Image Preview</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($imageShutdowns as $imageShutdown)
                                            <tr>
                                                <td>{{ $imageShutdown->id }}</td>
                                                <td>{{ $imageShutdown->image_name }}</td>
                                                <td>{{ $imageShutdown->image_type }}</td>
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
                                                    <a href="{{ route('image-shutdown.edit', $imageShutdown->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('image-shutdown.destroy', $imageShutdown->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
