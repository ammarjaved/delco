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
        <div class="container-fluid">
            <div class="container bg-white  shadow my-4 " style="border-radius: 10px">

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
      
    </ul>


    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="tab1" role="tabpanel">
    <h3 class="mt-3">Site Survey Information</h3>
        <div class="row">
        <div class="col-md-6">   
        <div class="form-group">
            <label for="nama_pe">Nama PE</label>
            <input type="text" class="form-control" id="nama_pe" name="nama_pe" value="{{ $siteSurvey->nama_pe ?? old('nama_pe') }}" required>
        </div>
       </div>
       <div class="col-md-6">
        <div class="form-group">
            <label for="kawasan">Kawasan</label>
            <input type="text" class="form-control" id="kawasan" name="kawasan" value="{{ $siteSurvey->kawasan ?? old('kawasan') }}" required>
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
                                <input type="radio" name="{{ $field }}" value="no" onclick="toggleFileUpload('{{ $field }}', false)" {{ isset($siteSurvey1) && $siteSurvey1->$field == 'no' ? 'checked' : '' }} style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;">
                                No
                            </label>
                        </div>
                        <div id="{{ $field }}_images" style="{{ (isset($siteSurvey1) && $siteSurvey1->$field == 'yes') ? '' : 'display: none;' }}">
                            @for ($i = 1; $i <= ($field == 'other' ? 4 : 2); $i++)
                                <div class="form-group">
                                    <label for="{{ $field }}_image{{ $i }}">{{ ucwords(str_replace('_', ' ', $field)) }} Image {{ $i }}</label>
                                    <input type="file" class="form-control-file" id="{{ $field }}_image{{ $i }}" name="{{ $field }}_image{{ $i }}">
    
                                    @if (isset($siteSurvey1) && $siteSurvey1->{"{$field}_image{$i}"})
                                        <img src="{{ asset($siteSurvey1->{"{$field}_image{$i}"}) }}" alt="{{ ucwords(str_replace('_', ' ', $field)) }} Image {{ $i }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            @endforeach
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
		</div>
    </section>
@endsection

<script>

// document.addEventListener('DOMContentLoaded', function() {
//     document.addEventListener('DOMContentLoaded', function() {
//     const submitBtn = document.getElementById('submitBtn');
//     let currentTabIndex = 0;

//     function updateSubmitButton() {
//         if (submitBtn) {
//             submitBtn.style.display = currentTabIndex === 2 ? 'inline-block' : 'none';
//         }
//     }

//     // Add event listener for tab changes
//     document.querySelectorAll('a[data-toggle="tab"]').forEach(function(tabElement, index) {
//         tabElement.addEventListener('shown.bs.tab', function (e) {
//             currentTabIndex = index;
//             updateSubmitButton();
//         });
//     });

//     // Initialize submit button state
//     updateSubmitButton();
// });
// });

function toggleFileUpload(field, show) {
        var fileUploadDiv = document.getElementById(field + '_images');
        fileUploadDiv.style.display = show ? 'block' : 'none';
    }



document.addEventListener('DOMContentLoaded', function() {
    const tabs = ['#tab1', '#tab2'];
    let currentTabIndex = 0;

    function updateButtons() {
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');

        if (prevBtn) prevBtn.style.display = currentTabIndex === 0 ? 'none' : 'inline-block';
        if (nextBtn) nextBtn.style.display = currentTabIndex === tabs.length - 1 ? 'none' : 'inline-block';
        if (submitBtn) submitBtn.style.display = currentTabIndex === tabs.length - 1 ? 'inline-block' : 'none';
    }

    function navigate(direction) {
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

</script>