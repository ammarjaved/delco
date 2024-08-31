<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSurvey;


class ToolboxTalkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $usr_info=\Auth::user();
        $area= $usr_info->area;
        $project= $usr_info->project;
            $var=$request->all();
            $var['created_by']= $usr_info->email;
            $var['updated_by']= $usr_info->email;
            $var['area']=$area;
            $var['project']=$project;


            $siteSurvey = SiteSurvey::create($var); 



        $toolbox['site_survey_id'] = $siteSurvey->id;
            $toolbox['pe_nama'] = $siteSurvey->nama_pe;
            $toolbox['lokasi'] = $usr_info->area;
            $toolbox['tarikh'] = $request->tarikh;
            $toolbox['cfs'] =  $usr_info->area;
            $toolbox['skop_kerja'] = $request->skop_kerja;
            $toolbox['ppd_safety_helment'] = $request->ppd_safety_helment;
            $toolbox['ppd_safety_vest'] = $request->ppd_safety_vest;
            $toolbox['ppd_safety_shoes'] = $request->ppd_safety_shoes;
            $toolbox['ppd_safety'] = $request->ppd_safety;
            $toolbox['equipment_condition'] = $request->equipment_condition;
            $toolbox['instrument_condition'] = $request->instrument_condition;

            $toolbox['instrument_kit_condition'] = $request->instrument_kit_condition;
            $toolbox['vehicle_fire_extinguisher'] = $request->vehicle_fire_extinguisher;
            $toolbox['vehicle_condition'] = $request->vehicle_condition;
            $toolbox['team_ap_tnp'] = $request->team_ap_tnp;
            $toolbox['team_cp_tnb'] = $request-> team_cp_tnb;
            $toolbox['niosh_staff_ntsp'] = $request-> niosh_staff_ntsp;
            $toolbox['permit_special'] = $request-> permit_special;
            $toolbox['permit_work'] = $request-> permit_work;
            $toolbox['picture_during_toolbox'] = $request-> picture_during_toolbox;
           
            $toolbox['traffic_safety_kon'] = $request->traffic_safety_kon;
            $toolbox['traffic_sign_board'] = $request->traffic_sign_board;
            $toolbox['traffic_chargeman'] = $request->traffic_chargeman;
            $toolbox['rcb'] = $request->rcb;
            $toolbox['efi'] = $request->efi;
            $toolbox['other'] = $request->other;

            $toolbox['toolbox_image1'] = $request->toolbox_image1;
            $toolbox['toolbox_image2'] = $request->toolbox_image2;
            $toolbox['created_by']= $usr_info->email;
            $toolbox['updated_by']= $usr_info->email;
            $toolbox['area']=$area;
            $toolbox['project']=$project;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
