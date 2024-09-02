<?php

namespace App\Http\Controllers;

use App\Models\ImageShutdown;
use App\Models\SiteSurvey; // Ensure this is imported
use Illuminate\Http\Request;
use App\Models\ToolBoxTalk;
use App\Repositories\SiteVisitRepository;

class ImageShutdownController extends Controller
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
    // Method to show the form for creating a new ImageShutdown
    public function create($id)
    {
        $survey = SiteSurvey::findOrFail($id);
        $imageShutdowns = ImageShutdown::where('site_survey_id', $id)->get(); // Get related image shutdowns

        return view('image_shutdown.create', ['survey' => $survey,'imageShutdowns' => $imageShutdowns  ]);
    }


    public function index()
    {
        // Fetch surveys from the database, including related ImageShutdown data
        $surveys = SiteSurvey::with(['imageShutdown','ToolBoxTalk'])->get(); // Use the correct model and relation

        // Return the index view with the fetched surveys
        return view('image_shutdown.index', compact('surveys'));
    }
    // Method to store a new ImageShutdown record
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'image_name' => 'required|string|max:255',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_type' => 'required|string',
            'site_survey_id' => 'required|exists:tbl_site_survey,id',
        ]);
    
        // Handle the file upload
       // $imagePath = $request->file('image_url')->store('images/shutdown', 'public');;
       $imagePath='';
       $destinationPath = 'assets/images/';
        if ($request->hasFile('image_url')) {
            $img_ext =$request->file('image_url')->getClientOriginalExtension();
            $filename ='image_url' . '-' . strtotime(now()) . '.' . $img_ext;
            $request->file('image_url')->move($destinationPath, $filename);
           // $pictureData[$field] = $request->file($field)->store('images', 'public');
           $imagePath =$destinationPath . $filename;
        }
    
        // Create the ImageShutdown record
        ImageShutdown::create([
            'image_name' => $request->input('image_name'),
            'image_url' => $imagePath,
            'image_type' => $request->input('image_type'),
            'site_survey_id' => $request->input('site_survey_id'),
            'created_by' => auth()->user()->id, // Assuming user authentication is set up
        ]);
    
        // Redirect with success message
        return redirect()->route('image-shutdown.create',['id'=>$request->site_survey_id])->with('success', 'Image Shutdown created successfully.');
    }
    public function edit($id)
    {
        $imageShutdown = ImageShutdown::findOrFail($id);
        return view('image_shutdown.edit', compact('imageShutdown'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'image_name' => 'required|string|max:255',
            'image_type' => 'required|string',
            // Add validation rules for other fields as needed
        ]);

        $imageShutdown = ImageShutdown::findOrFail($id);
        
        $imagePath='';
        $destinationPath = 'assets/images/';
         if ($request->hasFile('image_url')) {
             $img_ext =$request->file('image_url')->getClientOriginalExtension();
             $filename ='image_url' . '-' . strtotime(now()) . '.' . $img_ext;
             $request->file('image_url')->move($destinationPath, $filename);
            // $pictureData[$field] = $request->file($field)->store('images', 'public');
            $imagePath =$destinationPath . $filename;
         }

        $req_data=$request->all();
        $req_data['image_url']=$imagePath;
        $imageShutdown->update($req_data);

        return redirect()->route('image-shutdown.create', $imageShutdown->site_survey_id)
                         ->with('success', 'Image Shutdown updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $imageShutdown = ImageShutdown::findOrFail($id);
        $imageShutdown->delete();

        return redirect()->route('image-shutdown.create', $imageShutdown->site_survey_id)
                         ->with('success', 'Image Shutdown deleted successfully.');
    }

    
    public function createToolboxTalk($id)
    {
        $sitesurveydata = SiteSurvey::find($id);

      // return compact('sitesurveydata');

        return view('image_shutdown.toolboxtalk',compact('sitesurveydata'));
    }

    public function editToolboxTalk($id)
    {
        $toolboxtalk = ToolBoxTalk::find($id);

       // return $toolboxtalk;

       // $toolboxtalk = ToolBoxTalk::where('site_survey_id',$id)->where('skop_kerja','=','CABLING')->get()[0] ;

      // return compact('sitesurveydata');

     // return  $toolboxtalk;

        return view('image_shutdown.toolboxtalkedit',compact('toolboxtalk'));
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

            $usr_info= Auth::user();
          //  return $request;
            $toolbox=$this->siteRepository->addToolBoxTalk($request,$request->site_survey_id,$request->nama_pe,$usr_info);

            //return $toolbox;
            ToolBoxTalk::create($toolbox);


        } catch (\Throwable $th) {
            return redirect()->route('image-shutdown.index')->with('failed', 'Request Failed');
        }

        return redirect()->route('image-shutdown.index')->with('success', 'Request Success');
    }

    public function updateToolboxtalk(Request $request,$id)
    {
        try {

            $usr_info= Auth::user();
          //  return $request;
            $toolbox=$this->siteRepository->updateToolBoxTalk($request,$id,$usr_info);

           // return $toolbox;
            ToolBoxTalk::updateOrCreate(
                ['id' =>$id],
                $toolbox
            );     

        } catch (\Throwable $th) {
            return redirect()->route('image-shutdown.index')->with('failed', 'Request Failed');
        }

        return redirect()->route('image-shutdown.index')->with('success', 'Request Success');
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
}
