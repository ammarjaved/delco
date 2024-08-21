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

        <h2>Site Survey Information</h2>
        <div class="form-group">
            <label for="nama_pe">Nama PE</label>
            <input type="text" class="form-control" id="nama_pe" name="nama_pe" value="{{ $siteSurvey->nama_pe ?? old('nama_pe') }}" reado>
        </div>
        <div class="form-group">
            <label for="kawasan">Kawasan</label>
            <input type="text" class="form-control" id="kawasan" name="kawasan" value="{{ $siteSurvey->kawasan ?? old('kawasan') }}" required>
        </div>
        <div class="form-group">
            <label for="fl">FL</label>
            <input type="text" class="form-control" id="fl" name="fl" value="{{ $siteSurvey->fl ?? old('fl') }}">
        </div>

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
        
        
    <div class="form-group">
    <label for="jenis_perkakasuis">Jenis Perkakasuis</label>
    <!-- <input type="text" class="form-control" id="jenis_perkakasuis" name="jenis_perkakasuis" value="{{ $siteSurvey->jenis_perkakasuis ?? old('jenis_perkakasuis') }}"> -->
    <select class="form-control" id="jenis_perkakasuis" name="jenis_perkakasuis">
        <option value="">Jenis Perkakasuis</option>
        <option value="VCB" {{ (old('jenis_perkakasuis', $siteSurvey->jenis_perkakasuis ?? '') == 'VCB') ? 'selected' : '' }}>VCB</option>
        <option value="RMU" {{ (old('jenis_perkakasuis', $siteSurvey->jenis_perkakasuis ?? '') == 'RMU') ? 'selected' : '' }}>RMU</option>
    </select>
    </div>
        
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

        <div class="form-group">
            <label for="jenama_alatsuis">Jenama Alatsuis</label>
            <input type="text" class="form-control" id="jenama_alatsuis" name="jenama_alatsuis" value="{{ $siteSurvey->jenama_alatsuis ?? old('jenama_alatsuis') }}">
        </div>
        <div class="form-group">
            <label for="jenis_model">Jenis Model</label>
            <input type="text" class="form-control" id="jenis_model" name="jenis_model" value="{{ $siteSurvey->jenis_model ?? old('jenis_model') }}">
        </div>
        <div class="form-group">
            <label for="tahun_pembinaan">Tahun Pembinaan</label>
            <input type="date" class="form-control" id="tahun_pembinaan" name="tahun_pembinaan" value="{{ $siteSurvey->tahun_pembinaan ?? old('tahun_pembinaan') }}">
        </div>
        <div class="form-group">
            <label for="siri_alatsuis">Siri Alatsuis</label>
            <input type="text" class="form-control" id="siri_alatsuis" name="siri_alatsuis" value="{{ $siteSurvey->siri_alatsuis ?? old('siri_alatsuis') }}">
        </div>

        <!-- Repeat for suis_no1, suis_label1, kabel_jenis1, kabel_saiz1 -->
        @for ($i = 1; $i <= 5; $i++)
            <div class="form-group">
                <label for="suis_no{{ $i }}">Suis No {{ $i }}</label>
                <input type="text" class="form-control" id="suis_no{{ $i }}" name="suis_no{{ $i }}" value="{{ $siteSurvey->{"suis_no{$i}"} ?? old("suis_no{$i}") }}">
            </div>
            <div class="form-group">
                <label for="suis_label{{ $i }}">Suis Label {{ $i }}</label>
                <input type="text" class="form-control" id="suis_label{{ $i }}" name="suis_label{{ $i }}" value="{{ $siteSurvey->{"suis_label{$i}"} ?? old("suis_label{$i}") }}">
            </div>
    <div class="form-group">
        <label for="kabel_jenis{{ $i }}">Kabel Jenis {{ $i }}</label>
        <!-- <input type="text" class="form-control" id="kabel_jenis{{ $i }}" name="kabel_jenis{{ $i }}" value="{{ $siteSurvey->{"kabel_jenis{$i}"} ?? old("kabel_jenis{$i}") }}"> -->
    <select class="form-control" id="kabel_jenis{{ $i }}" name="kabel_jenis{{ $i }}">
        <option value="">Jenis Perkakasuis</option>
        <option value="2S+1F" {{ (old('kabel_jenis'.$i, $siteSurvey->{"kabel_jenis{$i}"} ?? '') == 'PILC') ? 'selected' : '' }}>PILC</option>
        <option value="2S+2F" {{ (old('kabel_jenis'.$i, $siteSurvey->{"kabel_jenis{$i}"} ?? '') == 'XLPE') ? 'selected' : '' }}>XLPE</option>
    </select>
            </div>
            <div class="form-group">
                <label for="kabel_saiz{{ $i }}">Kabel Saiz {{ $i }}</label>
                <!-- <input type="text" class="form-control" id="kabel_saiz{{ $i }}" name="kabel_saiz{{ $i }}" value="{{ $siteSurvey->{"kabel_saiz{$i}"} ?? old("kabel_saiz{$i}") }}"> -->
    <select class="form-control" id="kabel_saiz{{ $i }}" name="kabel_saiz{{ $i }}">
        <option value="">Jenis Perkakasuis</option>
        <option value="2S+1F" {{ (old('kabel_saiz'.$i, $siteSurvey->{"kabel_jenis{$i}"} ?? '') == '70MM') ? 'selected' : '' }}>70MM</option>
        <option value="2S+2F" {{ (old('kabel_saiz'.$i, $siteSurvey->{"kabel_jenis{$i}"} ?? '') == '185MM') ? 'selected' : '' }}>185MM</option>
    </select>
            </div>
        @endfor

        <div class="form-group">
            <label for="fius_saiz">Fius Saiz</label>
            <input type="text" class="form-control" id="fius_saiz" name="fius_saiz" value="{{ $siteSurvey->fius_saiz ?? old('fius_saiz') }}">
        </div>
        <div class="form-group">
            <label for="ct_saiz_protection">CT Saiz Protection</label>
            <input type="text" class="form-control" id="ct_saiz_protection" name="ct_saiz_protection" value="{{ $siteSurvey->ct_saiz_protection ?? old('ct_saiz_protection') }}">
        </div>
        <div class="form-group">
            <label for="ct_saiz_metering">CT Saiz Metering</label>
            <input type="text" class="form-control" id="ct_saiz_metering" name="ct_saiz_metering" value="{{ $siteSurvey->ct_saiz_metering ?? old('ct_saiz_metering') }}">
        </div>
        <div class="form-group">
            <label for="scada_status">SCADA Status</label>
            <input type="text" class="form-control" id="scada_status" name="scada_status" value="{{ $siteSurvey->scada_status ?? old('scada_status') }}">
        </div>
        <div class="form-group">
            <label for="bekalan_lv">Bekalan LV</label>
            <input type="text" class="form-control" id="bekalan_lv" name="bekalan_lv" value="{{ $siteSurvey->bekalan_lv ?? old('bekalan_lv') }}">
        </div>
        <div class="form-group">
            <label for="bacaan_beban">Bacaan Beban</label>
            <input type="text" class="form-control" id="bacaan_beban" name="bacaan_beban" value="{{ $siteSurvey->bacaan_beban ?? old('bacaan_beban') }}">
        </div>
        <div class="form-group">
            <label for="genset">Genset</label>
            <input type="text" class="form-control" id="genset" name="genset" value="{{ $siteSurvey->genset ?? old('genset') }}">
        </div>
        <div class="form-group">
            <label for="jenis_lvdb">Jenis LVDB</label>
            <input type="text" class="form-control" id="jenis_lvdb" name="jenis_lvdb" value="{{ $siteSurvey->jenis_lvdb ?? old('jenis_lvdb') }}">
        </div>
        <div class="form-group">
            <label for="keperluan_khas_kerja">Keperluan Khas Kerja</label>
            <input type="text" class="form-control" id="keperluan_khas_kerja" name="keperluan_khas_kerja" value="{{ $siteSurvey->keperluan_khas_kerja ?? old('keperluan_khas_kerja') }}">
        </div>
        <div class="form-group">
            <label for="susun">Susun</label>
            <input type="text" class="form-control" id="susun" name="susun" value="{{ $siteSurvey->susun ?? old('susun') }}">
        </div>

        <h2>Site Pictures</h2>
        @php
            $pictureFields = [
                'substation_fl', 'existing_switchgear', 'switchgear_nameplate', 'distribution_board',
                'battery_charger', 'battery_charger_nameplate', 'ceiling_tray', 'civil_location',
                'substation_entrance', 'cable_route', 'genset_location', 'feeder_tx',
                'trench_view', 'rtu', 'rcb', 'efi', 'other'
            ];
        @endphp

        @foreach ($pictureFields as $field)
            <div class="form-group">
                <label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                <input type="text" class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ $siteSurvey->$field ?? old($field) }}">
            </div>
            @for ($i = 1; $i <= ($field == 'other' ? 4 : 2); $i++)
                <div class="form-group">
                    <label for="{{ $field }}_image{{ $i }}">{{ ucwords(str_replace('_', ' ', $field)) }} Image {{ $i }}</label>
                    <input type="file" class="form-control-file" id="{{ $field }}_image{{ $i }}" name="{{ $field }}_image{{ $i }}">
                    @if(isset($siteSurvey) && $siteSurvey->{"{$field}_image{$i}"})
                        <img src="{{ asset('storage/'.$siteSurvey->{"{$field}_image{$i}"}) }}" alt="{{ ucwords(str_replace('_', ' ', $field)) }} Image {{ $i }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                    @endif
                </div>
            @endfor
        @endforeach

        <button type="submit" class="btn btn-primary">{{ isset($siteSurvey1) ? 'Update' : 'Create' }}</button>
    </form>
    </div>

        </div>
    </section>
@endsection