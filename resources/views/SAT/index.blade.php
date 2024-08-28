@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>SAT</h3>

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
                                            <a href="{{ route('sat.create', $survey->id) }}" class="btn btn-success">
                                                Add SAT
                                            </a>
                                            
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
