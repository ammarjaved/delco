@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Table</h2>
    
    <table class="table"  style="background-color:#E0EEE0;">
        <thead>
            <tr>
                <th>PE Name</th>
                <th>Material Code</th> 
                <th>Description</th>
                <th>Bun</th>
                <th>Quantity</th>
                <th>Action</th> <!-- New column for delete button -->
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama_pe }}</td>
                    <td>{{ $item->mat_code }}</td>
                    <td>{{ $item->mat_desc }}</td>
                    <td>{{ $item->bun }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        <form action="{{ route('material-selection.delete', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
@endsection
