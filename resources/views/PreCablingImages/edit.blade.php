@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Image PreCabling</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pre-cabling-images.update', $imageShutdown->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Image Name -->
                    <div class="col-md-4 form-group">
                        <label for="image_name">Image Name</label>
                        <input type="text" class="form-control" id="image_name" name="image_name" value="{{ $imageShutdown->image_name }}" required>
                    </div>


                    <div class="col-md-4 form-group">
                        <label for="image_desc">Image Description</label>
                        <input type="text" class="form-control" id="image_desc" name="image_desc" value="{{ $imageShutdown->image_desc }}" required>
                    </div>

                    <!-- Image Type -->
                    {{-- <div class="col-md-4 form-group">
                        <label for="image_type">Image Type</label>
                        <select class="form-control" id="image_type" name="image_type" required>
                            <option value="" disabled>Select Type</option>
                            <option value="before" {{ $imageShutdown->image_type == 'before' ? 'selected' : '' }}>Before</option>
                            <option value="during" {{ $imageShutdown->image_type == 'during' ? 'selected' : '' }}>During</option>
                            <option value="after" {{ $imageShutdown->image_type == 'after' ? 'selected' : '' }}>After</option>
                        </select>
                    </div> --}}

                    <!-- Upload New Image -->
                    <div class="col-md-4 form-group">
                        <label for="image_url">Upload New Image (Optional)</label>
                        <input type="file" class="form-control" id="image_url" name="image_url">
                        <small class="form-text text-muted">Leave empty if you do not want to change the image.</small>
                    </div>
                </div>

                <!-- Existing Image Display -->
                <div class="form-group">
                    <label for="existing_image">Existing Image</label>
                    <br>
                    <img src="{{ asset($imageShutdown->image_url) }}" alt="Existing Image" class="img-fluid" style="max-width: 300px;">
                </div>

                <!-- Submit and Cancel Buttons -->
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
