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

                <h3 class="text-center mb-4"> PIW Checklist</h3>

                <form
                    action="{{ isset($piw['id']) ? route('pre-cabling.update', $piw['id']) : route('pre-cabling.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($piw))
                        @method('PUT')
                    @endif
                    @csrf

                    {{-- <div class="row">
                        <div class="col-md4"><label for="pe_name"></label></div>
                        <div class="col-md4"></div>
                    </div> --}}


                    <input type="hidden" name="site_survey_id" value="{{isset($site_survey_id) ? $site_survey_id: $piw->site_survey_id}}">

                    @foreach (['lokasi_efi' => 'Lokasi EFI Seteah Dipasang', 'lokasi_rcb' => 'Lokasi RCB Seteah Dipasang', 'connection_rcb' => 'Connection RCB', 'lokasi_battery' => 'Lokasi Battery Charger Setelah Dipasang', 'plate_battery' => 'Plate Battery Charger / Serial No', 'lokasi_rtu' => 'Lokasi RTU Setelah Dipasang', 'connection_rtu' => 'Connection RTU', 'plate_rtu' => 'Plate RTU / Serial No', 'laluan_cable_piw' => 'Laluan Cable (PIW)', 'laluan_cable' => 'Laulan Cable'] as $key => $field)
                        <div class="row">

                            <div class="col-md-6">
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
                        @if (isset($piw))
                        <a href="{{route('pre-cabling-piw.delete', $piw->id)}}">
                            <button type="button" class="btn btn-danger mt-4" style="cursor: pointer !important"
                                type="submit">Remove</button>
                            </a>
                        @endif
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
