@extends('layouts.app', ['page_title' => 'Create'])

@section('content')
    <section class="content-header">
        <div class="container-  ">
            <div class="row mb-2" style="flex-wrap:nowrap">
                <div class="col-sm-6">
                    <h3>Pre Cabling</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{ route('pre-cabling.index') }}">index</a></li>
                        <li class="breadcrumb-item active">create</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="container bg-white  shadow my-4 " style="border-radius: 10px">

                <h3 class="text-center mb-4"> ShutDown Form</h3>

                <form
                    action="{{ isset($piw['id']) ? route('pre-cabling-shut-down.update', $piw['id']) : route('pre-cabling-shut-down.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($piw))
                        @method('PUT')
                    @endif
                    @csrf



                    <input type="hidden" name="site_survey_id" value="{{isset($site_survey_id) ? $site_survey_id : $piw->site_survey_id}}">

                    <div class="row">
                        <div class="col-md-6">
                    <h2 class="my-4" style="font-weight: 600">Remote Control Box</h2>
                    @foreach (['rcb_telah'  => 'RCB Telah Dipasang & Semua Kabel Telah Dibuat Tamatann', 
                               'rcb_setiap' => 'Setiap Set Kabel Telah Dilabelkan Degan Betul', 
                               'rcb_modifikasi' => 'Modifikasi dalam RCB Telah Dibuat', 
                               'rcb_ujian' => 'Ujian Keterusan Litar Untuk Setiap Kabel Telah Dibuat', 
                               'rcb_pemasangan' => 'Pemasangan Kemas dan Teratur'] as $key => $field)
                        <div class="row">

                            <div class="col-md-11">
                                <div class="form-group">
                                    <label for="{{ $key }}">{{ $field }}</label><br>

                                    <label for="{{ $key }}_yes">
                                        <input type="radio" id="{{ $key }}_yes" name="{{$key}}" value="yes"
                                            style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;"
                                            {{ ($piw->$key ?? old($key)) === 'yes' ? 'checked' : '' }}>
                                        Yes
                                    </label>
                                    <label for="{{ $key }}_no">
                                        <input type="radio" id="{{ $key }}_no" name="{{$key}}" value="no"
                                            style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;"
                                            {{ ($piw->$key ?? old($key)) === 'no' ? 'checked' : '' }}>
                                        No
                                    </label>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="col-md-6">

                    <h2 class="my-4" style="font-weight: 600">Remote Terminal Unit</h2>
                    @foreach (['rtu_rcb'  => 'RC    B Telah Dipasang & Semua Kabel Telah Dibuat Tamatann', 
                               'rtu_setiap' => 'Setiap Set Kabel Telah Dilabelkan Degan Betul', 
                               'rtu_ujian' => 'Ujian Keterusan Litar Untuk Setiap Kabel Telah Dibuat', 
                               'rtu_pemasangan' => 'Pemasangan Kemas dan Teratur'] as $key => $field)
                        <div class="row">

                            <div class="col-md-11">
                                <div class="form-group">
                                    <label for="{{ $key }}">{{ $field }}</label><br>

                                    <label for="{{ $key }}_yes">
                                        <input type="radio" id="{{ $key }}_yes" name="{{$key}}" value="yes"
                                            style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;"
                                            {{ ($piw->$key ?? old($key)) === 'yes' ? 'checked' : '' }}>
                                        Yes
                                    </label>
                                    <label for="{{ $key }}_no">
                                        <input type="radio" id="{{ $key }}_no" name="{{$key}}" value="no"
                                            style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;"
                                            {{ ($piw->$key ?? old($key)) === 'no' ? 'checked' : '' }}>
                                        No
                                    </label>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>

                    <h2 class="my-4" style="font-weight: 600">Cable</h2>
                    @foreach (['cable_laluan'  => 'Laluan Kabel Dan Tray Yang Tersusun', 
                               'cable_kabel' => 'Kabel Yang Dipasang Mengikut Spesifikasi TNB', 
                               'cable_pemasangan' => 'Pemasangan Kemas Dan Teratur', 
                               'cable_kawasan' => 'Kawasan Kerja Telah Dibersihkan'] as $key => $field)
                        <div class="row">

                            <div class="col-md-11">
                                <div class="form-group">
                                    <label for="{{ $key }}">{{ $field }}</label><br>

                                    <label for="{{ $key }}_yes">
                                        <input type="radio" id="{{ $key }}_yes" name="{{$key}}" value="yes"
                                            style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;"
                                            {{ ($piw->$key ?? old($key)) === 'yes' ? 'checked' : '' }}>
                                        Yes
                                    </label>
                                    <label for="{{ $key }}_no">
                                        <input type="radio" id="{{ $key }}_no" name="{{$key}}" value="no"
                                            style="appearance: radio; -webkit-appearance: radio; -moz-appearance: radio; width: auto; display: inline-block; margin-right: 5px;"
                                            {{ ($piw->$key ?? old($key)) === 'no' ? 'checked' : '' }}>
                                        No
                                    </label>
                                </div>
                            </div>

                        </div>
                    @endforeach








                    <div class="text-center">
                        <button class="btn btn-success mt-4" style="cursor: pointer !important"
                            type="submit">{{ isset($piw) ? 'Update' : 'Create' }}</button>
                    </div>

                </form>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
   
@endsection
