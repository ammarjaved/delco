<?php

namespace App\Http\Controllers;

use App\Models\SAT;
use App\Models\SiteSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Repositories\SiteVisitRepository;
use App\Models\ToolBoxTalk;


class SATController extends Controller
{


    private $siteRepository;

    public function __construct(SiteVisitRepository $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }

    
    // Method to list all SAT records for a specific Site Survey
    public function index()
    {
        $usr_info = \Auth::user();

        // Retrieve all Site Surveys created by the logged-in user
        $surveys = SiteSurvey::where('created_by', $usr_info->name)->get();

        // Pass the surveys to the 'SAT.index' view
        return view('SAT.index', compact('surveys'));
    }

    // Method to show the form for creating a new SAT
    public function create($id)
    {
        // Find the specific site survey by ID
        $survey = SiteSurvey::findOrFail($id);
    
        // Retrieve all SAT records related to this site survey
        $satRecords = SAT::where('site_survey_id', $id)->get();
    
        // Pass the site survey and SAT records to the 'SAT.create' view
        return view('SAT.create', compact('survey', 'satRecords'));
    }

    // Method to store a new SAT record
    public function store(Request $request)
{
    //dd($request->all()); // Debug the incoming request data
    try {
        // Validate the incoming request
        // $request->validate([
        //     'image_name' => 'required|string|max:255',
        //     'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'image_type' => 'required|string|in:before,during,after',
        //     'site_survey_id' => 'required|integer|exists:site_surveys,id',
        // ]);

        // Store the uploaded image in the 'images' directory within the 'public' disk
        $filePath = $request->file('image_url')->store('images', 'public');

        // Create a new SAT record in the database

        $sat_data=[
            'image_name' => $request->image_name,
            'image_url' => $filePath,
            'image_type' => $request->image_type,
            'site_survey_id' => $request->site_survey_id,
            'created_by' => \Auth::user()->email,
        ];

         $sat_data;

        SAT::create($sat_data);

        // Redirect back to the SAT index page with a success message
        return redirect()->route('sat.index')->with('success', 'Image shutdown added successfully!');
    } catch (Exception $e) {

     //   return $e->getMessage();
        // Redirect back with an error message
        return redirect()->route('sat.create', ['id' => $request->site_survey_id])
            ->with('failed', 'Request Failed: ' . $e->getMessage());
    }
}



    public function destroy($id)
    {
        $file = SAT::findOrFail($id);


        // Delete the file from the storage
        if (file_exists(public_path($file->file_path))) {
            unlink(public_path($file->file_path));
        }

        // Delete the record from the database
        $file->delete();

        return redirect()->back()->with('success', 'File deleted successfully.');
    }


    public function createToolboxTalk($id)
    {
        $sitesurveydata = SiteSurvey::find($id);
        

      // return compact('sitesurveydata');

        return view('SAT.toolboxtalk',compact('sitesurveydata'));
    }

    public function editToolboxTalk($id)
    {
        $toolboxtalk = ToolBoxTalk::find($id);

       // return $toolboxtalk;

       // $toolboxtalk = ToolBoxTalk::where('site_survey_id',$id)->where('skop_kerja','=','CABLING')->get()[0] ;

      // return compact('sitesurveydata');

     // return  $toolboxtalk;

        return view('SAT.toolboxtalkedit',compact('toolboxtalk'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeToolboxtalk(Request $request)
    {
        try {

            $usr_info= \Auth::user();
        //    return $request;

            $toolbox=$this->siteRepository->addToolBoxTalk($request,$request->site_survey_id,$request->nama_pe,$usr_info);
            
            //  return $toolbox;
            ToolBoxTalk::create($toolbox);


        } catch (\Throwable $th) {
            // return $th;
          return redirect()->route('sat.index')->with('failed', 'Request Failed');
            
        }

        return redirect()->route('sat.index')->with('success', 'Request Success');
    }

    public function updateToolboxtalk(Request $request,$id)
    {
        try {

            $usr_info= \Auth::user();
          //  return $request;
            $toolbox=$this->siteRepository->updateToolBoxTalk($request,$id,$usr_info);

           // return $toolbox;
            ToolBoxTalk::updateOrCreate(
                ['id' =>$id],
                $toolbox
            );     

        } catch (\Throwable $th) {
            return redirect()->route('sat.index')->with('failed', 'Request Failed');
        }

        return redirect()->route('sat.index')->with('success', 'Request Success');
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


}
