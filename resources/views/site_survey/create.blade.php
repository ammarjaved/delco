@extends('layouts.app', ['page_title' => 'Create'])

@section('content')
    <section class="content-header">
        <div class="container-  ">
            <div class="row mb-2" style="flex-wrap:nowrap">
                <div class="col-sm-6">
                    <h3>Site Data</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{ route('site_survey.index') }}">index</a></li>
                        <li class="breadcrumb-item active">create</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid" >
            <div class="container   shadow my-4 " style="border-radius: 10px;background-color:#E0EEE0;" >

                <h3 class="text-center mb-4"> Site Data Collections</h3>
                
<form action="{{ isset($siteSurvey['id']) ? route('site_survey.update', $siteSurvey['id']) : route('site_survey.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
        @if(isset($siteSurvey))
            @method('PUT')
        @endif

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab">Site Survey Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab">Site Survey Pic</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab">Tool Box Talk</a>
      </li>
     
    </ul>


    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="tab1" role="tabpanel">
    <h3 class="mt-3">Site Survey Information</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_pe">Nama PE <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="nama_pe" name="nama_pe" value="{{ $siteSurvey->nama_pe ?? old('nama_pe') }}" required>
                    <div id="nama_pe_error" class="text-danger" style="display: none;">Please fill this field.</div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kawasan">Kawasan <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="kawasan" name="kawasan" value="{{ $siteSurvey->kawasan ?? \Auth::user()->area }}" required>
                    <div id="kawasan_error" class="text-danger" style="display: none;">Please fill this field.</div>
                </div>
            </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="fl">FL</label>
            <input type="text" class="form-control" id="fl" name="fl" value="{{ $siteSurvey->fl ?? old('fl') }}">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="jenis">PE Jenis</label>
            <select name="jenis" id="jenis" class="form-control" value="{{ $siteSurvey->jenis ?? old('jenis') }}">
                                <option value="" hidden>Select Type</option>
                                <option value="STANDALONE"  {{ (old('jenis', $siteSurvey->jenis ?? '') == 'STANDALONE') ? 'selected' : '' }}>STANDALONE</option>
                                <option value="ATTACHED" {{ (old('jenis', $siteSurvey->jenis ?? '') == 'ATTACHED') ? 'selected' : '' }}>ATTACHED</option>
                                <option value="OUTDOOR" {{ (old('jenis', $siteSurvey->jenis ?? '') == 'OUTDOOR') ? 'selected' : '' }}>OUTDOOR</option>
                                <option value="COMPACT" {{ (old('jenis', $siteSurvey->jenis ?? '') == 'COMPACT') ? 'selected' : '' }}>COMPACT</option>
            </select>
        </div>
        </div>
        <div class="col-md-6">
        <div style="margin-bottom: 15px;">
    <label style="display: block; margin-bottom: 5px;">Peparit:</label>
    <label style="display: inline-block; margin-right: 15px;">
        <input type="radio" name="peparit" value="yes" {{ (old('peparit', $siteSurvey->peparit ?? '') == 'yes') ? 'checked' : '' }} style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;">
        Yes
    </label>
    <label style="display: inline-block;">
        <input type="radio" name="peparit" value="no" {{ (old('peparit', $siteSurvey->peparit ?? '') == 'no') ? 'checked' : '' }} style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;">
        No
    </label>
</div>
</div>
        <div class="col-md-6">
                <div class="form-group">
                    <label for="jenis_kompaun">Jenis Kompaun</label>
                    <select class="form-control" id="jenis_kompaun" name="jenis_kompaun">
                <option value="">Pilih Jenis Kompaun</option>
                <option value="Simen" {{ (old('jenis_kompaun', $siteSurvey->jenis_kompaun ?? '') == 'Simen') ? 'selected' : '' }}>Simen</option>
                <option value="Rumput" {{ (old('jenis_kompaun', $siteSurvey->jenis_kompaun ?? '') == 'Rumput') ? 'selected' : '' }}>Rumput</option>
                <option value="inter-locking" {{ (old('jenis_kompaun', $siteSurvey->jenis_kompaun ?? '') == 'inter-locking') ? 'selected' : '' }}>inter-locking</option>
                <option value="Crusher Run" {{ (old('jenis_kompaun', $siteSurvey->jenis_kompaun ?? '') == 'Crusher Run') ? 'selected' : '' }}>Crusher Run</option>
                <option value="Tidak" {{ (old('jenis_kompaun', $siteSurvey->jenis_kompaun ?? '') == 'Tidak') ? 'selected' : '' }}>Tidak</option>
            </select>
                </div>
        </div>    
        <div class="col-md-6">       
            <div class="form-group">
            <label for="jenis_perkakasuis">Jenis Perkakasuis</label>
            <!-- <input type="text" class="form-control" id="jenis_perkakasuis" name="jenis_perkakasuis" value="{{ $siteSurvey->jenis_perkakasuis ?? old('jenis_perkakasuis') }}"> -->
            <select class="form-control" id="jenis_perkakasuis" name="jenis_perkakasuis">
                <option value="">Jenis Perkakasuis</option>
                <option value="VCB" {{ (old('jenis_perkakasuis', $siteSurvey->jenis_perkakasuis ?? '') == 'VCB') ? 'selected' : '' }}>VCB</option>
                <option value="RMU" {{ (old('jenis_perkakasuis', $siteSurvey->jenis_perkakasuis ?? '') == 'RMU') ? 'selected' : '' }}>RMU</option>
            </select>
            </div>
        </div>
        <div class="col-md-6">    
            <div class="form-group">
            <label for="konfigurasi">Konfigurasi</label>
            <!-- <input type="text" class="form-control" id="konfigurasi" name="konfigurasi" value="{{ $siteSurvey->konfigurasi ?? old('konfigurasi') }}"> -->
            <select class="form-control" id="konfigurasi" name="konfigurasi">
                <option value="">Jenis Perkakasuis</option>
                <option value="2S+1F" {{ (old('konfigurasi', $siteSurvey->jenis_perkakasuis ?? '') == '2S+1F') ? 'selected' : '' }}>2S+1F</option>
                <option value="2S+2F" {{ (old('konfigurasi', $siteSurvey->jenis_perkakasuis ?? '') == '2S+2F') ? 'selected' : '' }}>2S+2F</option>
                <option value="3S" {{ (old('konfigurasi', $siteSurvey->jenis_perkakasuis ?? '') == '3S') ? 'selected' : '' }}>3S</option>
                <option value="3S+1F" {{ (old('konfigurasi', $siteSurvey->jenis_perkakasuis ?? '') == '3S+1F') ? 'selected' : '' }}>3S+1F</option>
                <option value="3S+2F" {{ (old('konfigurasi', $siteSurvey->jenis_perkakasuis ?? '') == '3S+2F') ? 'selected' : '' }}>3S+2F</option>

            </select>
            </div>
        </div>
        <div class="col-md-6">
                <div class="form-group">
                    <label for="jenama_alatsuis">Jenama Alatsuis</label>
                    <input type="text" class="form-control" id="jenama_alatsuis" name="jenama_alatsuis" value="{{ $siteSurvey->jenama_alatsuis ?? old('jenama_alatsuis') }}">
                </div>
        </div>
        <div class="col-md-6">
                <div class="form-group">
                    <label for="jenis_model">Jenis Model</label>
                    <input type="text" class="form-control" id="jenis_model" name="jenis_model" value="{{ $siteSurvey->jenis_model ?? old('jenis_model') }}">
                </div>
        </div>
        <div class="col-md-6">     
                <div class="form-group">
                    <label for="tahun_pembinaan">Tahun Pembinaan</label>
                    <input type="date" class="form-control" id="tahun_pembinaan" name="tahun_pembinaan" value="{{ $siteSurvey->tahun_pembinaan ?? old('tahun_pembinaan') }}">
                </div>
        </div>
        <div class="col-md-6">    
                <div class="form-group">
                    <label for="siri_alatsuis">Siri Alatsuis</label>
                    <input type="text" class="form-control" id="siri_alatsuis" name="siri_alatsuis" value="{{ $siteSurvey->siri_alatsuis ?? old('siri_alatsuis') }}">
                </div>
        </div>
        <!-- Repeat for suis_no1, suis_label1, kabel_jenis1, kabel_saiz1 -->
        @for ($i = 1; $i <= 5; $i++)
        <div class="col-md-6">
            <div class="form-group">
                <label for="suis_no{{ $i }}">Suis No {{ $i }}</label>
                <input type="text" class="form-control" id="suis_no{{ $i }}" name="suis_no{{ $i }}" value="{{ $siteSurvey->{"suis_no{$i}"} ?? old("suis_no{$i}") }}">
            </div>
        </div>

        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="suis_label{{ $i }}">Suis Label {{ $i }}</label>
                        <input type="text" class="form-control" id="suis_label{{ $i }}" name="suis_label{{ $i }}" value="{{ $siteSurvey->{"suis_label{$i}"} ?? old("suis_label{$i}") }}">
                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="kabel_jenis{{ $i }}">Kabel Jenis {{ $i }}</label>
                <!-- <input type="text" class="form-control" id="kabel_jenis{{ $i }}" name="kabel_jenis{{ $i }}" value="{{ $siteSurvey->{"kabel_jenis{$i}"} ?? old("kabel_jenis{$i}") }}"> -->
            <select class="form-control" id="kabel_jenis{{ $i }}" name="kabel_jenis{{ $i }}">
                <option value="">Jenis Perkakasuis</option>
                <option value="2S+1F" {{ (old('kabel_jenis'.$i, $siteSurvey->{"kabel_jenis{$i}"} ?? '') == 'PILC') ? 'selected' : '' }}>PILC</option>
                <option value="2S+2F" {{ (old('kabel_jenis'.$i, $siteSurvey->{"kabel_jenis{$i}"} ?? '') == 'XLPE') ? 'selected' : '' }}>XLPE</option>
            </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                        <label for="kabel_saiz{{ $i }}">Kabel Saiz {{ $i }}</label>
                        <!-- <input type="text" class="form-control" id="kabel_saiz{{ $i }}" name="kabel_saiz{{ $i }}" value="{{ $siteSurvey->{"kabel_saiz{$i}"} ?? old("kabel_saiz{$i}") }}"> -->
            <select class="form-control" id="kabel_saiz{{ $i }}" name="kabel_saiz{{ $i }}">
                <option value="">Jenis Perkakasuis</option>
                <option value="2S+1F" {{ (old('kabel_saiz'.$i, $siteSurvey->{"kabel_jenis{$i}"} ?? '') == '70MM') ? 'selected' : '' }}>70MM</option>
                <option value="2S+2F" {{ (old('kabel_saiz'.$i, $siteSurvey->{"kabel_jenis{$i}"} ?? '') == '185MM') ? 'selected' : '' }}>185MM</option>
            </select>
            </div>
        </div>    
        @endfor
        <div class="col-md-6">
        <div class="form-group">
            <label for="fius_saiz">Fius Saiz</label>
            <input type="text" class="form-control" id="fius_saiz" name="fius_saiz" value="{{ $siteSurvey->fius_saiz ?? old('fius_saiz') }}">
        </div>
        </div>
        <div class="col-md-6">  
        <div class="form-group">
            <label for="ct_saiz_protection">CT Saiz Protection</label>
            <input type="text" class="form-control" id="ct_saiz_protection" name="ct_saiz_protection" value="{{ $siteSurvey->ct_saiz_protection ?? old('ct_saiz_protection') }}">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="ct_saiz_metering">CT Saiz Metering</label>
            <input type="text" class="form-control" id="ct_saiz_metering" name="ct_saiz_metering" value="{{ $siteSurvey->ct_saiz_metering ?? old('ct_saiz_metering') }}">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="scada_status">SCADA Status</label>
            <input type="text" class="form-control" id="scada_status" name="scada_status" value="{{ $siteSurvey->scada_status ?? old('scada_status') }}">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="bekalan_lv">Bekalan LV</label>
            <input type="text" class="form-control" id="bekalan_lv" name="bekalan_lv" value="{{ $siteSurvey->bekalan_lv ?? old('bekalan_lv') }}">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="bacaan_beban">Bacaan Beban</label>
            <input type="text" class="form-control" id="bacaan_beban" name="bacaan_beban" value="{{ $siteSurvey->bacaan_beban ?? old('bacaan_beban') }}">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="genset">Genset</label>
            <input type="text" class="form-control" id="genset" name="genset" value="{{ $siteSurvey->genset ?? old('genset') }}">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="jenis_lvdb">Jenis LVDB</label>
            <input type="text" class="form-control" id="jenis_lvdb" name="jenis_lvdb" value="{{ $siteSurvey->jenis_lvdb ?? old('jenis_lvdb') }}">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="keperluan_khas_kerja">Keperluan Khas Kerja</label>
            <input type="text" class="form-control" id="keperluan_khas_kerja" name="keperluan_khas_kerja" value="{{ $siteSurvey->keperluan_khas_kerja ?? old('keperluan_khas_kerja') }}">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="susun">Susun</label>
            <input type="text" class="form-control" id="susun" name="susun" value="{{ $siteSurvey->susun ?? old('susun') }}">
        </div>
        </div>
        </div>
        <div class="row">
            <div class="col-5">
                <input type="text" hidden  class="form-control" placeholder="lat" value="{{ $location->y ?? old('') }}" name="lat" id="lat" readonly>
            </div>
            <div class="col-5">
                <input type="text" hidden  class="form-control" placeholder="lng" value="{{ $location->x ?? old('') }}" name="lng" id="lng" readonly>
            </div>
        </div>
        <div id="map" style="height: 400px; width: 100%;" class="my-3"></div>
    </div>

    


    
    <div class="tab-pane fade" id="tab2" role="tabpanel">
        <h3 class="mt-3">Site Pictures</h3>
    
        @php
            $pictureFields = [
                'substation_fl', 'existing_switchgear', 'switchgear_nameplate', 'distribution_board',
                'battery_charger', 'battery_charger_nameplate', 'ceiling_tray', 'civil_location',
                'substation_entrance', 'cable_route', 'genset_location', 'feeder_tx',
                'trench_view', 'rtu', 'rcb', 'efi', 'other'
            ];
        @endphp
    
        <div class="row">
            @foreach ($pictureFields as $field)
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ ucwords(str_replace('_', ' ', $field)) }}:</label>
                        <div style="margin-bottom: 15px;">
                            <label style="display: inline-block; margin-right: 15px;">
                                <input type="radio" name="{{ $field }}" value="yes" onclick="toggleFileUpload('{{ $field }}', true)" {{ isset($siteSurvey1) && $siteSurvey1->$field == 'yes' ? 'checked' : '' }} style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;">
                                Yes
                            </label>
                            <label style="display: inline-block;">
                                <input type="radio" name="{{ $field }}" value="no" onclick="toggleFileUpload('{{ $field }}', false)" {{ !isset($siteSurvey1) || $siteSurvey1->$field == 'no' ? 'checked' : '' }} style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;">
                                No
                            </label>
                        </div>
                        <div id="{{ $field }}_images" style="{{ (isset($siteSurvey1) && $siteSurvey1->$field == 'yes') ? '' : 'display: none;' }}">
                            @for ($i = 1; $i <= ($field == 'other' ? 4 : 2); $i++)
                                <div class="form-group">
                                    <label for="{{ $field }}_image{{ $i }}">{{ ucwords(str_replace('_', ' ', $field)) }} Image {{ $i }}</label>
                                    <input type="file" class="form-control-file" id="{{ $field }}_image{{ $i }}" name="{{ $field }}_image{{ $i }}">
                                    @if (isset($siteSurvey1) && $siteSurvey1->{"{$field}_image{$i}"})
                                        <img src="{{ asset($siteSurvey1->{"{$field}_image{$i}"}) }}" id='img_{{$field}}{{$i}}' alt="{{ ucwords(str_replace('_', ' ', $field)) }} Image {{ $i }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                                    @else
                                        <img src="" id='img_{{$field}}{{$i}}' alt="{{ ucwords(str_replace('_', ' ', $field)) }} Image {{ $i }}" class="img-thumbnail mt-2" style="max-width: 200px;">

                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    
        
       <div class="tab-pane fade" id="tab3" role="tabpanel">
    <h3 class="mt-3">ToolBoxTalk</h3> 
    
       <div class="row">
        {{-- <div class="col-md-6">

            <div class="form-group">
                <label for="lokasi">Lokasi</label><br>
                <input type="text" id="lokasi" name="lokasi" class="form-control" value="{{ $toolboxTalk->lokasi ?? old('lokasi') }}">
            </div>
            
</div> --}}

<div class="col-md-6">
    <div class="form-group">
            <label for="tarikh">Tarikh</label>
            <input type="date" class="form-control" id="tarikh" name="tarikh" value="{{ $toolboxTalk->tarikh ?? old('tarikh') }}" required>
        </div>


    </div>

</div>
    
<div class="row">
    {{-- <div class="col-md-6"> --}}
    {{-- <div class="form-group">
        <label for="cfs">CFS</label><br>
        <label for="cfs_yes">
            <input type="radio" id="cfs_yes" name="cfs" value="yes" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->cfs ?? old('cfs')) === 'yes' ? 'checked' : '' }}>
            Yes
        </label>
        <label for="cfs_no">
            <input type="radio" id="cfs_no" name="cfs" value="no" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->cfs ?? old('cfs','no')) === 'no' ? 'checked' : '' }}>
            No
        </label>
    </div> --}}
{{-- </div> --}}

    
<div class="col-md-6">
    <div class="form-group">
        <label for="skop_kerja">Skop Kerja</label><br>
        <input type="text" id="skop_kerja" name="skop_kerja" class="form-control" value="SITE-SURVEY" readonly>
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
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->$field ?? old($field,'no')) === 'yes' ? 'checked' : '' }}>
                Yes
            </label>
            <label for="{{ $field }}_no">
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->$field ?? old($field,'no')) === 'no' ? 'checked' : '' }}>
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
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->$field ?? old($field,'no')) === 'yes' ? 'checked' : '' }}>
                Yes
            </label>
            <label for="{{ $field }}_no">
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->$field ?? old($field,'no')) === 'no' ? 'checked' : '' }}>
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
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->$field ?? old($field,'no')) === 'yes' ? 'checked' : '' }}>
                Yes
            </label>
            <label for="{{ $field }}_no">
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->$field ?? old($field,'no')) === 'no' ? 'checked' : '' }}>
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
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->$field ?? old($field,'no')) === 'yes' ? 'checked' : '' }}>
                Yes
            </label>
            <label for="{{ $field }}_no">
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->$field ?? old($field,'no')) === 'no' ? 'checked' : '' }}>
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
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->$field ?? old($field,'no')) === 'yes' ? 'checked' : '' }}>
                Yes
            </label>
            <label for="{{ $field }}_no">
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->$field ?? old($field,'no')) === 'no' ? 'checked' : '' }}>
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
                <input type="radio" id="{{ $field }}_yes" name="{{ $field }}" value="yes" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->$field ?? old($field,'no')) === 'yes' ? 'checked' : '' }}>
                Yes
            </label>
            <label for="{{ $field }}_no">
                <input type="radio" id="{{ $field }}_no" name="{{ $field }}" value="no" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->$field ?? old($field,'no')) === 'no' ? 'checked' : '' }}>
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
            <input type="radio" id="picture_during_toolbox_yes" onclick="toggleImageInputs(true)"  name="picture_during_toolbox" value="yes" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->picture_during_toolbox ?? old('picture_during_toolbox', 'no')) === 'yes' ? 'checked' : '' }}>
            Yes
        </label>
        <label for="picture_during_toolbox_no">
            <input type="radio" id="picture_during_toolbox_no" onclick="toggleImageInputs(false)" name="picture_during_toolbox" value="no" style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;" {{ ($toolboxTalk->picture_during_toolbox ?? old('picture_during_toolbox', 'no')) === 'no' ? 'checked' : '' }}>
            No
        </label>
    </div>
</div>
</div>

       <!-- Toolbox Image 1-->
       
<!-- <div class="row">
    <div class="col-md-6">
       <div class="form-group">
        <label for="upload_images">Toolbox Images</label><br>
        <label for="upload_images_yes">
            <input type="radio" id="upload_images_yes" name="upload_images" value="yes"  style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;"  onclick="toggleImageInputs(true)">
            Yes
        </label>
        <label for="upload_images_no">
            <input type="radio" id="upload_images_no" name="upload_images" value="no"  style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;"onclick="toggleImageInputs(false)" checked>
            No
        </label>
    </div>
    </div>
</div> -->

    <!-- Conditional Image Inputs -->
    <div class="row">
        <div class="col-md-6">
<div id="image_inputs" style="display: none;">
    <div class="form-group">
        <label for="toolbox_image1">Toolbox Image 1</label>
        <input type="file" class="form-control-file" id="toolbox_image1" name="toolbox_image1">
        @if(isset($toolboxTalk->toolbox_image1) && $toolboxTalk->toolbox_image1)
            <img src="{{ asset($toolboxTalk->toolbox_image1) }}" alt="Toolbox Image 1" class="img-thumbnail mt-2" style="max-width: 200px;">
        @endif
    </div>
    
    <div class="form-group">
        <label for="toolbox_image2">Toolbox Image 2</label>
        <input type="file" class="form-control-file" id="toolbox_image2" name="toolbox_image2">
        @if(isset($toolboxTalk->toolbox_image2) && $toolboxTalk->toolbox_image2)
            <img src="{{ asset($toolboxTalk->toolbox_image2) }}" alt="Toolbox Image 2" class="img-thumbnail mt-2" style="max-width: 200px;">
        @endif
    </div>
</div>
 </div>

</div>

</div>


    <div class="mt-3">
      <button type="button" class="btn btn-secondary" id="prevBtn" onclick="navigate(-1)">Previous</button>
      <button type="button" class="btn btn-primary" id="nextBtn" onclick="navigate(1)">Next</button>
      <button type="submit" class="btn btn-success" id="submitBtn" style="display:none;">{{ isset($siteSurvey) ? 'Update' : 'Create' }}</button>

    </div>


        
    </form>

   
    </div>
	</div>
    </section>
@endsection

<script>


function toggleFileUpload(field, show) {
    var fileUploadDiv = document.getElementById(field + '_images');
    fileUploadDiv.style.display = show ? 'block' : 'none';
}

function toggleImageInputs(show) {
    document.getElementById('image_inputs').style.display = show ? 'block' : 'none';
}

// Initialize based on existing data if any
document.addEventListener('DOMContentLoaded', function() {
    var isYes = document.querySelector('input[name="picture_during_toolbox"]:checked')?.value === 'yes';
    toggleImageInputs(isYes);
});






// Function to check if all required images are uploaded
document.addEventListener('DOMContentLoaded', function() {
    const tabs = ['#tab1', '#tab2', '#tab3'
    ];
    let currentTabIndex = 0;


    $('.nav-tabs li').click(function() {
        checkactiveTabId();
    })

    function updateButtons() {
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');

        // Handle button display
        if (prevBtn) prevBtn.style.display = currentTabIndex === 0 ? 'none' : 'inline-block';
        if (nextBtn) nextBtn.style.display = currentTabIndex === tabs.length - 1 ? 'none' : 'inline-block';
        if (submitBtn) submitBtn.style.display = currentTabIndex === tabs.length - 1 ? 'inline-block' : 'none';
    }

    function validateImageUploads() {
        let isValid = true;
        const pictureFields = [
            'substation_fl', 'existing_switchgear', 'switchgear_nameplate', 'distribution_board',
            'battery_charger', 'battery_charger_nameplate', 'ceiling_tray', 'civil_location',
            'substation_entrance', 'cable_route', 'genset_location', 'feeder_tx',
            'trench_view', 'rtu', 'rcb', 'efi', 'other'
        ];

        var status= '{{isset($siteSurvey['id'])}}';


        var j=1;
       for(var i=0;i<pictureFields.length;i++){
         for(var j=1;j<3;j++){
        $('#'+pictureFields[i]+'_image'+j).change(function() {
          //  var input = $('#'+pictureFields[i]+'_image'+j)[0];
              var input=this;
                   var inputid=input.id;
                  var img_name=inputid.split('_');
                      imgsrc='';
                   if(img_name.length==3){
                    imgsrc=img_name[0]+'_'+img_name[1]+img_name[2].charAt(img_name[2].length-1);
                   }else if(img_name.length==4){
                    imgsrc=img_name[0]+'_'+img_name[1]+'_'+img_name[2]+img_name[3].charAt(img_name[3].length-1);
                   }else if(img_name.length==2){
                    imgsrc=img_name[0]+img_name[1].charAt(img_name[1].length-1);
                   }

            if (input.files && input.files.length > 0) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img_'+imgsrc).attr('src',e.target.result).show()
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        });
    }
    }
   

        

        if(status==''){
        pictureFields.forEach(field => {
            const isYesChecked = document.querySelector(`input[name="${field}"][value="yes"]`).checked;
            if (isYesChecked) {
                const files = document.querySelector('input[type="file"]');
                let allFilesUploaded = Array.from(files).every(input => input.files.length > 0);
                
                if (!allFilesUploaded) {
                    isValid = false;
                }
                
            }

        });
     }else{
        pictureFields.forEach(field => {
        const isYesChecked = document.querySelector(`input[name="${field}"][value="yes"]`).checked;
        if(isYesChecked){
       if(field=='other'){
        for(var i=1;i<=4;i++){
           var srcVal= $('#img_'+field+i).attr('src');
           if(!srcVal){
            isValid = false;
           }
        }
              
       }else{
        for(var i=1;i<=2;i++){
           var srcVal= $('#img_'+field+i).attr('src');
           if(!srcVal){
            isValid = false;
           }
        }
       }
    }

       });
     }

        return isValid;
    }

    function validateFields() {
        const namaPe = document.getElementById('nama_pe').value.trim();
        const kawasan = document.getElementById('kawasan').value.trim();
        let isValid = true;

        // Reset error messages
        document.getElementById('nama_pe_error').style.display = 'none';
        document.getElementById('kawasan_error').style.display = 'none';

        if (namaPe === '') {
            document.getElementById('nama_pe_error').style.display = 'block';
            isValid = false;
        }

        if (kawasan === '') {
            document.getElementById('kawasan_error').style.display = 'block';
            isValid = false;
        }

        return isValid && validateImageUploads();
    }

    function navigate(direction) {

        if (direction === 1 && !validateFields()) {
            alert('Please complete all required fields.');
            return; // Prevent navigation if validation fails
        }
        currentTabIndex += direction;
       
        if (currentTabIndex >= 0 && currentTabIndex < tabs.length) {
            
            const tabElement = document.querySelector(`a[href="${tabs[currentTabIndex]}"]`);
            if (tabElement && typeof bootstrap !== 'undefined') {
                const tab = new bootstrap.Tab(tabElement);
                tab.show();
            } else {
                console.error('Tab element not found or Bootstrap is not available');
            }
         
            updateButtons();
        }
      
    }

    // Initialize button states
    updateButtons();

    // Add event listener for tab changes
    document.querySelectorAll('a[data-toggle="tab"]').forEach(function(tabElement) {
        tabElement.addEventListener('shown.bs.tab', function (e) {
            currentTabIndex = tabs.indexOf(e.target.getAttribute('href'));
            updateButtons();
        });
    });

    // Navigation button click handlers
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    if (prevBtn) prevBtn.addEventListener('click', function() { navigate(-1); });
    if (nextBtn) nextBtn.addEventListener('click', function() { navigate(1); });
});


document.addEventListener('DOMContentLoaded', function () {
                    let map = L.map('map').setView([3.2888784335929744,102.06586684019376], 8);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
                    var mark1='';

                    if($("#lat").val()!='' && $("#lng").val()!=''){
                        mark1= L.marker([$("#lng").val(),$("#lat").val()]).addTo(map)
                    }
                    
                    
                   

                    map.on('click', function (e) {
                        if(mark1!=''){
                            map.removeLayer(mark1);
                        }
                      
                    mark1= L.marker([e.latlng.lat,e.latlng.lng]).addTo(map)

                        document.getElementById('lat').value = e.latlng.lat;
                        document.getElementById('lng').value = e.latlng.lng;
                    });
                });

</script>





