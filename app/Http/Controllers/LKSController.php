<?php

namespace App\Http\Controllers;

use App\Models\SitePicture;
use App\Models\SiteSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ToolBoxTalk;

use Exception;

class LKSController extends Controller{

    public function index()
    {
        $usr_info = Auth::user();
        $surveys = SiteSurvey::where('created_by', $usr_info->email)->get();

        // Pass the surveys to the 'SAT.index' view
        return view('LKS.index', compact('surveys'));
    }


    public function create($id)
    {
        // Find the specific site survey by ID
        $survey = SiteSurvey::findOrFail($id);
        // return $survey;
        $toolboxtalk=ToolBoxTalk::where('site_survey_id',$survey->id)->get()[0];

        $pictureData=SitePicture::where('site_survey_id',$survey->id)->get()[0];

       

       
      

    
        return view('LKS.show', compact('survey','toolboxtalk','pictureData'));
    }














}
















?>
