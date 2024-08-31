<?php

namespace App\Repositories;

use App\Models\SiteImage;
use Illuminate\Support\Facades\Log;

class SiteVisitRepository {


    public function addToolBoxTalk($request,$id,$pe_name, $usr_info){

        $destinationPath = 'assets/images/';


        $toolbox['site_survey_id'] = $id;
        $toolbox['pe_nama'] = $pe_name;
        $toolbox['lokasi'] = $usr_info->area;
        $toolbox['tarikh'] = $request->tarikh;
        $toolbox['cfs'] =  $usr_info->area;
        $toolbox['skop_kerja'] = $request->skop_kerja;
        $toolbox['ppd_safety_helment'] = $request->ppd_safety_helment;
        $toolbox['ppd_safety_vest'] = $request->ppd_safety_vest;
        $toolbox['ppd_safety_shoes'] = $request->ppd_safety_shoes;
        $toolbox['ppd_safety'] = $request->ppd_safety;
        $toolbox['equipment_condition'] = $request->equipment_condition;
        $toolbox['instrument_condition'] = $request->instrument_condition; //

        $toolbox['instrument_kit_condition'] = $request->instrument_kit_condition;//
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
        $toolbox['area']=  $usr_info->area;
        $toolbox['project']=  $usr_info->project;

        $toolboxImageFields = ['toolbox_image1', 'toolbox_image2'];

        foreach ($toolboxImageFields as $field) {
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

            return    $toolbox;
    }


    public function updateToolBoxTalk($request,$id, $usr_info){

        $destinationPath = 'assets/images/';

        $toolbox['id'] = $id;
        $toolbox['lokasi'] = $usr_info->area;
        $toolbox['tarikh'] = $request->tarikh;
        $toolbox['cfs'] =  $usr_info->area;
        $toolbox['skop_kerja'] = $request->skop_kerja;
        $toolbox['ppd_safety_helment'] = $request->ppd_safety_helment;
        $toolbox['ppd_safety_vest'] = $request->ppd_safety_vest;
        $toolbox['ppd_safety_shoes'] = $request->ppd_safety_shoes;
        $toolbox['ppd_safety'] = $request->ppd_safety;
        $toolbox['equipment_condition'] = $request->equipment_condition;
        $toolbox['instrument_condition'] = $request->instrument_condition; //

        $toolbox['instrument_kit_condition'] = $request->instrument_kit_condition;//
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
        $toolbox['area']=  $usr_info->area;
        $toolbox['project']=  $usr_info->project;

        $toolboxImageFields = ['toolbox_image1', 'toolbox_image2'];

        foreach ($toolboxImageFields as $field) {
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

            return    $toolbox;
    }







    public function addImages(array $request, $id, $status)
{
    try{
    if ($request) {
        $destinationPath = 'assets/images/';
        $uploadedImages = [];

        foreach ($request as $key => $file) {
            if (is_uploaded_file($file)) {
                $img_ext = $file->getClientOriginalExtension();
                $filename = $key . '-' . strtotime(now()) . '.' . $img_ext;
                $file->move($destinationPath, $filename);
                $uploadedImages[$key] = $destinationPath . $filename;
            }
        }


        $data = SiteImage::where('site_data_id', $id)->where('status', $status)->first();

        if ($data) {
    
 
            $data->update($uploadedImages);
        }else{
            $uploadedImages['status'] = $status;
            $uploadedImages['site_data_id'] = $id;
// dd($data);
            SiteImage::create($uploadedImages);
        }
    }
    }catch (\Exception $e) {

          Log::error($e->getMessage());
        return $e->getMessage();
    }

}



    public function removeImg(array $data)
    {
        $i = 0 ;
        foreach($data as $key => $path){
            if(file_exists(public_path($path))){
                $i++;
            }
        }
        dd($i);

    }



}
