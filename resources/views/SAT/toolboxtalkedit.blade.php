@extends('layouts.app', ['page_title' => 'Create'])

@section('content')
<div class="container">
<h3 class="mt-3">ToolBoxTalk</h3> 

<form action="{{route('SAT.toolboxtalk.update',$toolboxtalk['id'])}}" method="POST" enctype="multipart/form-data">
                @csrf
        @if(isset($siteSurvey))
            @method('PUT')
@endif
<div style="display:none;">
<input type="text" value="{{$toolboxtalk->pe_name}}" name="nama_pe" />
     <input type="text" value="{{$toolboxtalk->site_survey_id}}" name="site_survey_id"/>
</div>     

       <div class="row">
        {{-- <div class="col-md-6">

            <div class="form-group">
                <label for="lokasi">Lokasi</label><br>
                <input type="text" id="lokasi" name="lokasi" class="form-control" value="{{ $toolboxtalk->lokasi ?? old('lokasi') }}">
            </div>
            
</div> --}}

<div class="col-md-6">
    <div class="form-group">
            <label for="tarikh">Tarikh</label>
            <input type="date" class="form-control" id="tarikh" name="tarikh" value="{{ $toolboxtalk->tarikh}}" required>
        </div>


    </div>

</div>
    
<div class="row">
    {{-- <div class="col-md-6"> --}}
    {{-- <div class="form-group">
        <label for="cfs">CFS</label><br>
        <label for="cfs_yes">
            <input type="radio" id="cfs_yes" name="cfs" value="yes" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->cfs ?? old('cfs')) === 'yes' ? 'checked' : '' }}>
            Yes
        </label>
        <label for="cfs_no">
            <input type="radio" id="cfs_no" name="cfs" value="no" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->cfs ?? old('cfs','no')) === 'no' ? 'checked' : '' }}>
            No
        </label>
    </div> --}}
{{-- </div> --}}

    
<div class="col-md-6">
    <div class="form-group">
        <label for="skop_kerja">Skop Kerja</label><br>
        <input type="text" id="skop_kerja" name="skop_kerja" class="form-control" value="SAT" readonly>
    </div>
</div>


</div>


   
    <!-- PPD Safety fields -->
    <div class="row">
    @foreach(['ppd_safety_helment', 'ppd_safety_vest', 'ppd_safety_shoes', 'ppd_safety'] as $field)
    <div class="col-md-6">
        <div class="form-group">
            <label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</label><br>
            <label for="{{ $field }}_yes">
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'yes' ? 'checked' : '' }}>
                Yes
            </label>
            <label for="{{ $field }}_no">
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'no' ? 'checked' : '' }}>
                No
            </label>
        </div>
    </div>
    @endforeach
</div>

    <!-- Equipment fields -->
    <div class="row">
    @foreach(['equipment_condition','instrument_condition', 'instrument_kit_condition'] as $field)
    <div class="col-md-6">
        <div class="form-group">
            <label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</label><br>
            <label for="{{ $field }}_yes">
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'yes' ? 'checked' : '' }}>
                Yes
            </label>
            <label for="{{ $field }}_no">
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'no' ? 'checked' : '' }}>
                No
            </label>
        </div>
    </div>
    @endforeach
</div>

    <!-- Vehicle fields -->
    <div class="row">
    @foreach(['vehicle_fire_extinguisher', 'vehicle_condition'] as $field)
    <div class="col-md-6">
        <div class="form-group">
            <label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</label><br>
            <label for="{{ $field }}_yes">
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'yes' ? 'checked' : '' }}>
                Yes
            </label>
            <label for="{{ $field }}_no">
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'no' ? 'checked' : '' }}>
                No
            </label>
        </div>
    </div>
    @endforeach
</div>

    <!-- Traffic fields -->
    <div class="row">
    @foreach(['traffic_safety_kon', 'traffic_sign_board', 'traffic_chargeman'] as $field)
    <div class="col-md-6">
        <div class="form-group">
            <label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</label><br>
            <label for="{{ $field }}_yes">
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'yes' ? 'checked' : '' }}>
                Yes
            </label>
            <label for="{{ $field }}_no">
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'no' ? 'checked' : '' }}>
                No
            </label>
        </div>
    </div>
    @endforeach

</div>


    <!-- Team fields -->
    <div class="row">
    @foreach(['team_ap_tnp', 'team_cp_tnb'] as $field)
    <div class="col-md-6">
        <div class="form-group">
            <label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</label><br>
            <label for="{{ $field }}_yes">
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'yes' ? 'checked' : '' }}>
                Yes
            </label>
            <label for="{{ $field }}_no">
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'no' ? 'checked' : '' }}>
                No
            </label>
        </div>
    </div>
    @endforeach
</div>

    <!-- NIOSH fields -->
    <div class="row">
    @foreach(['niosh_staff_ntsp', 'permit_special','permit_work'] as $field)
    <div class="col-md-6">
        <div class="form-group">
            <label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</label><br>
            <label for="{{ $field }}_yes">
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'yes' ? 'checked' : '' }}>
                Yes
            </label>
            <label for="{{ $field }}_no">
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->$field ?? old($field,'no')) === 'no' ? 'checked' : '' }}>
                No
            </label>
        </div>
    </div>
    @endforeach
</div>

<div class="row">
    <div class="col-md-6">
    <div class="form-group">
        <label for="picture_during_toolbox">Picture During Toolbox</label><br>
        <label for="picture_during_toolbox_yes">
            <input type="radio" id="picture_during_toolbox_yes" name="picture_during_toolbox" value="yes"  onclick="toggleImageInputs(true)" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->picture_during_toolbox ?? old('picture_during_toolbox', 'no')) === 'yes' ? 'checked' : '' }}>
            Yes
        </label>
        <label for="picture_during_toolbox_no">
            <input type="radio" id="picture_during_toolbox_no" name="picture_during_toolbox" value="no"  onclick="toggleImageInputs(false)" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxtalk->picture_during_toolbox ?? old('picture_during_toolbox', 'no')) === 'no' ? 'checked' : '' }}>
            No
        </label>
    </div>
</div>
</div>

       <!-- Toolbox Image 1-->
       
{{-- <div class="row">
    <div class="col-md-6">
       <div class="form-group">
        <label for="upload_images">Toolbox Images</label><br>
        <label for="upload_images_yes">
            <input type="radio" id="upload_images_yes" name="upload_images" value="yes"  style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" onclick="toggleImageInputs(true)">
            Yes
        </label>
        <label for="upload_images_no">
            <input type="radio" id="upload_images_no" name="upload_images" value="no"  style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;"onclick="toggleImageInputs(false)" checked>
            No
        </label>
    </div>
    </div>
</div> --}}

    <!-- Conditional Image Inputs -->
    <div class="row">
        <div class="col-md-6">
<div id="image_inputs" style="display: none;">
    <div class="form-group">
        <label for="toolbox_image1">Toolbox Image 1</label>
        <input type="file" class="form-control-file" id="toolbox_image1" name="toolbox_image1">
        @if(isset($toolboxtalk->toolbox_image1) && $toolboxtalk->toolbox_image1)
            <img src="{{ asset($toolboxtalk->toolbox_image1) }}" alt="Toolbox Image 1" class="img-thumbnail mt-2" style="max-width: 200px;">
        @endif
    </div>
    
    <div class="form-group">
        <label for="toolbox_image2">Toolbox Image 2</label>
        <input type="file" class="form-control-file" id="toolbox_image2" name="toolbox_image2">
        @if(isset($toolboxtalk->toolbox_image2) && $toolboxtalk->toolbox_image2)
            <img src="{{ asset($toolboxtalk->toolbox_image2) }}" alt="Toolbox Image 2" class="img-thumbnail mt-2" style="max-width: 200px;">
        @endif
    </div>
</div>
 </div>

 <div class="mt-3" id="button-container">
      <button type="submit" class="btn btn-success" id="submitBtn" >Update</button>
    </div>

    </form> 
    </div>
    <form action="{{ route('toolbox-talks.destroy', $toolboxtalk->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Toolbox Talk?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    
    
 @endsection 

 <script>
    function toggleImageInputs(show) {
        const imageInputs = document.getElementById('image_inputs');
        const updateButton = document.getElementById('submitBtn');
        const buttonContainer = document.getElementById('button-container');

        if (show) {
            imageInputs.style.display = 'block';
            if (updateButton && !imageInputs.contains(updateButton)) {
                imageInputs.appendChild(updateButton);
            }
        } else {
            imageInputs.style.display = 'none';
            if (updateButton && !buttonContainer.contains(updateButton)) {
                buttonContainer.appendChild(updateButton);
            }
        }
    }
</script>
  