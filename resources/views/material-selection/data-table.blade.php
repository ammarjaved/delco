@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Table</h2>
    
    <table class="table">
        <thead>
            <tr>
                <th>PE Name</th>
                <th>Material Code</th> 
                <th>Description</th>
                <th>Bun</th>
                <th>Quantity</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
