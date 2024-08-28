@extends('layouts.app')


@section('content')
<div class="container">
    <h2>Material Selection</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

        <!-- <div class="input-group"> -->
            <input type="text" name="search" id="search_input1" class="form-control typeahead" placeholder="Search by material" >
            <button type="button"  class="btn btn-primary" onclick="addData()">Add</button>
        <!-- </div> -->
 
    <!-- Use the dynamic siteSurvey ID -->
    <form action="{{ route('material-selection.save', ['id' => $siteSurvey->id]) }}" method="POST">
        @csrf
        
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Material Code</th>
                    <th>Description</th>
                    <th>BUn</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody id='mat_sel'>

               
                 
            

            </tbody>
        </table>

        <button type="submit" class="btn btn-success">Save Selections</button>
    </form>
</div>

<style>
   .twitter-typeahead {
    width: 80%;
}

/* Input field styling */
.typeahead {
    width: 80%;
    padding: 8px 12px;
    font-size: 14px;
    /* line-height: 1.428571429; */
    /* border: 1px solid #ccc;
    border-radius: 4px; */
}

.typeahead:focus {
    border-color: #66afe9;
    outline: 0;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
}

/* Dropdown menu styling */
.tt-dropdown-menu {
    width: 80%;
    padding: 3px 0;
    margin-top: 2px;
    background-color: #fff;
    /* border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 4px; */
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

/* Dropdown item styling */
.tt-suggestion {
    padding: 3px 20px;
    font-size: 14px;
    line-height: 24px;
}

.tt-suggestion.tt-cursor {
    color: #fff;
    background-color: #0097cf;
}

.tt-suggestion p {
    margin: 0;
}
 </style>   
@endsection

<script>

document.addEventListener('DOMContentLoaded', function () {
    var searchMaterialUrl = '{{ route("search.material") }}';
$('#search_input1').typeahead({
                name: 'hce1',
                remote: searchMaterialUrl+'?key=%QUERY',
                limit: 5
});

    });


var i=0;    
function addData(){
var myval=$('#search_input1').val();
if(myval!=''){
var searchMaterialUrl = '{{ route("data.material") }}';

$.ajax({
        url: searchMaterialUrl+'?desc='+myval,
        dataType: 'JSON',
        //data: data,
        method: 'GET',
        async: false,
        success: function callback(data) {
            
        var str='<tr><td><input type="text"  name="data['+i+'][id]" value="'+data[0].id+'"'+ 
        '/></td><td><input type="text"  name="data['+i+'][mat_code]" value="'+data[0].mat_code+'"'+ 
        '/></td><td><input type="text"  name="data['+i+'][mat_desc]" value="'+data[0].mat_desc+'" />'+
       '</td><td><input type="text"  name="data['+i+'][bun]" value="'+data[0].bun+'" /></td>'+
        '<td><input type="text"  name="data['+i+'][quantity]" value="0"/></td></tr>'   
         $("#mat_sel").append(str);
         $('#search_input1').val('');
         i++;
        }
    });
}else{
    alert("please select material first")
}

}


</script> 





