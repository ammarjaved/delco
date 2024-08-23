@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Material Selection</h2>

    <form action="{{ route('material-selection.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by material code or description" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
 
    <form action="{{ route('material-selection.save', ['id' => 18]) }}" method="POST">
        @csrf
        
        <table class="table">
            <thead>
                <tr>
                    <th>PE NAME</th>
                    <th>Material Code</th>
                    <th>Description</th>
                    <th>BUn</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                 
                @foreach ($materials as $material)
                <tr>
                    <td>{{ $material->mat_code }}</td>
                    <td>{{ $material->mat_desc }}</td>
                    <td>{{ $material->bun }}</td>
                    <td>
                        <input type="number" name="selections[{{ $material->id }}]" value="0" min="0" class="form-control" style="width: 100px;">
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <button type="submit" class="btn btn-success">Save Selections</button>
    </form>
</div>
@endsection