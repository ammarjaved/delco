@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Material Selection</h3>

    <div class="card">
        <div class="card-body">
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
                        @foreach ($surveys as $survey)
                        <tr>
                            <td>{{ $survey->id }}</td>
                            <td>{{ $survey->nama_pe }}</td>
                            <td>{{ $survey->kawasan }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Action Buttons">
                                    <div class="mx-2">
                                        <a href="{{ route('material-selection.index', ['id' => $survey->id]) }}" class="btn btn-primary">
                                            <i class="fas fa-list-alt"></i> Add Material Selection
                                        </a>
                                    </div>

                                    <div class="mx-2">
                                        <a href="{{ route('material-selection.show', $survey->id) }}" class="btn btn-success">
                                            <i class="fas fa-eye"></i> Show Materials
                                        </a>
                                    </div>

                                    <div class="btn-group" role="group" aria-label="Delete Actions">
                                        <!-- Delete Site Survey Button -->
                                        <form action="{{ route('site_survey.destroy', $survey->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Site Survey?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
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
@endsection
