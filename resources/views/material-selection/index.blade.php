@extends('layouts.app')


@section('content')
<div class="container">
    <h2>Material Selection</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

        <div class="input-group">
            <input type="text" name="search" id="search_input1" class="form-control typeahead" placeholder="Search by material code or description" >
            <button type="button" class="btn btn-primary">Search</button>
        </div>
 
    <!-- Use the dynamic siteSurvey ID -->
    <form action="{{ route('material-selection.save', ['id' => $siteSurvey->id]) }}" method="POST">
        @csrf
        
        <table class="table">
            <thead>
                <tr>
                    
                    <th>Material Code</th>
                    <th>Description</th>
                    <th>BUn</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                 
            

            </tbody>
        </table>

        <button type="submit" class="btn btn-success">Save Selections</button>
    </form>
</div>


@endsection

@section('scripts')
<script>
$(document).ready(function () {
$('#search_input1').typeahead({
                name: 'hce1',
                remote:'search_material?key=%QUERY',
                limit: 5
});

    });
</script> 
@endsection


