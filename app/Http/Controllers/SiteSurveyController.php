<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSurvey;
use App\Models\SitePicture;
use App\Models\ToolBoxTalk;

use Exception;
use Illuminate\Support\Facades\DB;



class SiteSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = SiteSurvey::all();
        return view('site_survey.index',compact('surveys')); //compact('surveys') is equivalent to ['surveys' => $surveys].

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site_survey.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         try {

            $pe_check=SiteSurvey::where('nama_pe',$request->nama_pe)->first();

            if($pe_check){
                return redirect()
                ->route('site_survey.index')
                ->with('failed', 'Request Failed PE Name already exist');
            }

        
       // DB::transaction(function () use ($validatedData, $request) {
            $siteSurvey = SiteSurvey::create($request->all()); 

            DB::statement("UPDATE tbl_site_survey set geom = ST_GeomFromText('POINT($request->lng $request->lat)',4326) where id = $siteSurvey->id");



            $pictureData['site_survey_id'] = $siteSurvey->id;
            $pictureData['substation_fl'] = $request->substation_fl;
            $pictureData['existing_switchgear'] = $request->existing_switchgear;
            $pictureData['switchgear_nameplate'] = $request->switchgear_nameplate;
            $pictureData['distribution_board'] = $request->distribution_board;
            $pictureData['battery_charger'] = $request->battery_charger;
            $pictureData['battery_charger_nameplate'] = $request->battery_charger_nameplate;
            $pictureData['ceiling_tray'] = $request->ceiling_tray;
            $pictureData['civil_location'] = $request->civil_location;
            $pictureData['substation_entrance'] = $request->substation_entrance;
            $pictureData['cable_route'] = $request->cable_route;
            $pictureData['genset_location'] = $request->genset_location;
            $pictureData['feeder_tx'] = $request->feeder_tx;
            $pictureData['trench_view'] = $request->trench_view;
            $pictureData['rtu'] = $request->rtu;
            $pictureData['rcb'] = $request->rcb;
            $pictureData['efi'] = $request->efi;
            $pictureData['other'] = $request->other;
        
            $toolbox['site_survey_id'] = $siteSurvey->id;
            $toolbox['pe_nama'] = $siteSurvey->nama_pe;
            $toolbox['lokasi'] = $request->lokasi;
            $toolbox['tarikh'] = $request->tarikh;
            $toolbox['cfs'] = $request->cfs;
            $toolbox['skop_kerja'] = $request->skop_kerja;
            $toolbox['ppd_safety_helment'] = $request->ppd_safety_helment;
            $toolbox['ppd_safety_vest'] = $request->ppd_safety_vest;
            $toolbox['ppd_safety_shoes'] = $request->ppd_safety_shoes;
            $toolbox['ppd_safety'] = $request->ppd_safety;
            $toolbox['equipment_condition'] = $request->equipment_condition;
            $toolbox['equipment_kit_condition'] = $request->equipment_kit_condition;
            $toolbox['vehicle_fire_extinguisher'] = $request->vehicle_fire_extinguisher;
            $toolbox['vehicle_condition'] = $request->vehicle_condition;
            $toolbox['team_ap_tnp'] = $request->team_ap_tnp;
            $toolbox['team_cp_tnb'] = $request-> team_cp_tnb;
            $toolbox['niosh_staff_ntsp'] = $request-> niosh_staff_ntsp;
            $toolbox['niosh_special_permit'] = $request-> niosh_special_permit;
            $toolbox['picture_during_toolbox'] = $request-> picture_during_toolbox;
           
            $toolbox['traffic_safety_kon'] = $request->traffic_safety_kon;
            $toolbox['traffic_sign_board'] = $request->traffic_sign_board;
            $toolbox['traffic_chargeman'] = $request->traffic_chargeman;
            $toolbox['rcb'] = $request->rcb;
            $toolbox['efi'] = $request->efi;
            $toolbox['other'] = $request->other;

            $toolbox['toolbox_image1'] = $request->toolbox_image1;
            $toolbox['toolbox_image2'] = $request->toolbox_image2;



        

    
            // Handle file uploads
            $imageFields = [
                'substation_fl_image1', 'substation_fl_image2',
                'existing_switchgear_image1', 'existing_switchgear_image2',
                'switchgear_nameplate_image1', 'switchgear_nameplate_image2',
                'distribution_board_image1', 'distribution_board_image2',
                'battery_charger_image1', 'battery_charger_image2',
                'battery_charger_nameplate_image1', 'battery_charger_nameplate_image2',
                'ceiling_tray_image1', 'ceiling_tray_image2',
                'civil_location_image1', 'civil_location_image2',
                'substation_entrance_image1', 'substation_entrance_image2',
                'cable_route_image1', 'cable_route_image2',
                'genset_location_image1', 'genset_location_image2',
                'feeder_tx_image1', 'feeder_tx_image2',
                'trench_view_image1', 'trench_view_image2',
                'rtu_image1', 'rtu_image2',
                'rcb_image1', 'rcb_image2',
                'efi_image1', 'efi_image2',
                'other_image1', 'other_image2', 'other_image3', 'other_image4'
            ];
            $destinationPath = 'assets/images/';

            $imageFields = ['toolbox_image1', 'toolbox_image2'];

    
                foreach ($imageFields as $field) {
                    if ($request->hasFile($field) && $field!='toolbox_image1' &&  $field!='toolbox_image2') {
                        $img_ext =$request->file($field)->getClientOriginalExtension();
                        $filename =$field . '-' . strtotime(now()) . '.' . $img_ext;
                        $request->file($field)->move($destinationPath, $filename);
                       // $pictureData[$field] = $request->file($field)->store('images', 'public');
                       $pictureData[$field] =$destinationPath . $filename;
                    }
                }


                foreach ($imageFields as $field) {
                    if ($request->hasFile($field)) {
                        if($field=='toolbox_image1'  || $field=='toolbox_image2'){
                        $img_ext =$request->file($field)->getClientOriginalExtension();
                        $filename =$field . '-' . strtotime(now()) . '.' . $img_ext;
                        $request->file($field)->move($destinationPath, $filename);
                       // $pictureData[$field] = $request->file($field)->store('images', 'public');
                        $toolbox[$field] =$destinationPath . $filename;
                        }
                    }
                }

        //           foreach ($imageFields as $field) {
        //     if ($request->hasFile($field)) {
        //         $img_ext = $request->file($field)->getClientOriginalExtension();
        //         $filename = $field . '-' . time() . '.' . $img_ext;
        //         $request->file($field)->move(public_path($destinationPath), $filename);
        //         $toolbox[$field] = $destinationPath . $filename;
        //     }
        // }
    
           // return $pictureData;
            SitePicture::create($pictureData);
            ToolBoxTalk::create($toolbox);

       // });
    
        return redirect()->route('site_survey.index')
            ->with('success', 'Site survey and pictures created successfully.');
        }

        catch (Exception $e) {
            return $e->getMessage();
            return redirect()
                ->route('site-data-collection.index')
                ->with('failed', 'Request Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siteSurvey = SiteSurvey::find($id);
        $siteSurvey1 = SitePicture::where('site_survey_id',$id)->get()[0];
        $toolboxTalk = toolboxTalk::where('site_survey_id', $id)->first();
        $sql='select st_x(geom) as x,st_y(geom) as y from tbl_site_survey where id='.$id;
        $location=DB::select($sql)[0];

       
    //  $combinedArray =  (object) array_merge($data->toArray(), $data1->toArray());
    // return $siteSurvey1;
    return view('site_survey.show', compact('siteSurvey','siteSurvey1','toolboxTalk','location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siteSurvey = SiteSurvey::find($id);
        $siteSurvey1 = SitePicture::where('site_survey_id',$id)->get()[0];
        $toolboxTalk = toolboxTalk::where('site_survey_id', $id)->first();
        $sql='select st_x(geom) as x,st_y(geom) as y from tbl_site_survey where id='.$id;
        $location=DB::select($sql)[0];

    

       
    //  $combinedArray =  (object) array_merge($data->toArray(), $data1->toArray());
    // return $siteSurvey1;
    return view('site_survey.create', compact('siteSurvey','siteSurvey1','toolboxTalk','location'));

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
       // DB::transaction(function () use ($validatedData, $request, $siteSurvey) {
            $siteSurvey=SiteSurvey::find($id)->update($request->all());

            DB::statement("UPDATE tbl_site_survey set geom = ST_GeomFromText('POINT($request->lng $request->lat)',4326) where id =  $id");

    
            $pictureData['site_survey_id'] = $id;
            $pictureData['substation_fl'] = $request->substation_fl;
            $pictureData['existing_switchgear'] = $request->existing_switchgear;
            $pictureData['switchgear_nameplate'] = $request->switchgear_nameplate;
            $pictureData['distribution_board'] = $request->distribution_board;
            $pictureData['battery_charger'] = $request->battery_charger;
            $pictureData['battery_charger_nameplate'] = $request->battery_charger_nameplate;
            $pictureData['ceiling_tray'] = $request->ceiling_tray;
            $pictureData['civil_location'] = $request->civil_location;
            $pictureData['substation_entrance'] = $request->substation_entrance;
            $pictureData['cable_route'] = $request->cable_route;
            $pictureData['genset_location'] = $request->genset_location;
            $pictureData['feeder_tx'] = $request->feeder_tx;
            $pictureData['trench_view'] = $request->trench_view;
            $pictureData['rtu'] = $request->rtu;
            $pictureData['rcb'] = $request->rcb;
            $pictureData['efi'] = $request->efi;
            $pictureData['other'] = $request->other;
    
            // Handle file uploads
            $imageFields = [
                'substation_fl_image1', 'substation_fl_image2',
                'existing_switchgear_image1', 'existing_switchgear_image2',
                'switchgear_nameplate_image1', 'switchgear_nameplate_image2',
                'distribution_board_image1', 'distribution_board_image2',
                'battery_charger_image1', 'battery_charger_image2',
                'battery_charger_nameplate_image1', 'battery_charger_nameplate_image2',
                'ceiling_tray_image1', 'ceiling_tray_image2',
                'civil_location_image1', 'civil_location_image2',
                'substation_entrance_image1', 'substation_entrance_image2',
                'cable_route_image1', 'cable_route_image2',
                'genset_location_image1', 'genset_location_image2',
                'feeder_tx_image1', 'feeder_tx_image2',
                'trench_view_image1', 'trench_view_image2',
                'rtu_image1', 'rtu_image2',
                'rcb_image1', 'rcb_image2',
                'efi_image1', 'efi_image2',
                'other_image1', 'other_image2', 'other_image3', 'other_image4'
            ];
            $destinationPath = 'assets/images/';

            foreach ($imageFields as $field) {
                if ($request->hasFile($field)) {
                    $img_ext =$request->file($field)->getClientOriginalExtension();
                    $filename =$field . '-' . strtotime(now()) . '.' . $img_ext;
                    $request->file($field)->move($destinationPath, $filename);
                   // $pictureData[$field] = $request->file($field)->store('images', 'public');
                   $pictureData[$field] =$destinationPath . $filename;
                }
            }

       // return $pictureData;
      //  SitePicture::create($pictureData);
    
      SitePicture::updateOrCreate(
                ['site_survey_id' => $id],
                $pictureData
            );
       // });
    
        return redirect()->route('site_survey.index')
            ->with('success', 'Site survey and pictures updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $sitevar=SiteSurvey::find($id);
            $sitevar->delete();
    
            SitePicture::where('site_survey_id',$id)->delete();
    
            ToolBoxTalk::where('site_survey_id',$id)->delete();
            return redirect()
            ->route('site_survey.index')
            ->with('success', 'Data successfully deleted');

        } catch (Exception $e) {
            return $e->getMessage();
            return redirect()
                ->route('site_survey.index')
                ->with('failed', 'Request Failed');
        }
    
        
    }
}
