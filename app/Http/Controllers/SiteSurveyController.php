<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSurvey;
use App\Models\SitePicture;
use App\Models\ToolBoxTalk;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Repositories\SiteVisitRepository;





class SiteSurveyController extends Controller
{

    private $siteRepository;

    public function __construct(SiteVisitRepository $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $myuser=\Auth::user();
        // return $myuser->area.'-'.$myuser->project.'-'.$myuser->vendo;

        $surveys = SiteSurvey::where('area',$myuser->area)
                            ->where('project','=',$myuser->project)->get();

        //  return  $surveys;                  
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


           
       $usr_info=\Auth::user();
       $area= $usr_info->area;
       $project= $usr_info->project;
           $var=$request->all();
           $var['created_by']= $usr_info->email;
           $var['updated_by']= $usr_info->email;
           $var['area']=$area;
           $var['project']=$project;
             
           

            $siteSurvey = SiteSurvey::create($var); 

            

            DB::statement("UPDATE tbl_site_survey set geom = ST_GeomFromText('POINT($request->lng $request->lat)',4326) where id = $siteSurvey->id");
           

            // DB::statement("update tbl_site_survey set area='$area' ,project='$company' where id = $siteSurvey->id"); 


               
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

            $pictureData['created_by']= $usr_info->email;
            $pictureData['updated_by']= $usr_info->email;
            $pictureData['area']=$area;
            $pictureData['project']=$project;
        
            

        

    
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



                $toolbox=$this->siteRepository->addToolBoxTalk($request,$siteSurvey->id,$siteSurvey->nama_pe,$usr_info);

            
    
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

            $tbk=ToolBoxTalk::where('site_survey_id',$id)->where('skop_kerja','=','SITE-SURVEY')->get();
            

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


            $usr_info=\Auth::user();

            $toolbox=$this->siteRepository->updateToolBoxTalk($request,$tbk[0]->id,$usr_info);


       // return $pictureData;
      //  SitePicture::create($pictureData);
    
      SitePicture::updateOrCreate(
                ['site_survey_id' => $id],
                $pictureData
            );

            ToolBoxTalk::updateOrCreate(
                ['id' => $tbk[0]->id],
                $toolbox
            );     

           // ToolBoxTalk::where('id',$tbk[0]->id)->update([$toolbox]);
                  
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
