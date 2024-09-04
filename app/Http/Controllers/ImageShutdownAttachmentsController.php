<?php

namespace App\Http\Controllers;

use App\Models\ImageShutdownAttachments;
use App\Models\SiteSurvey;
use Illuminate\Http\Request;

class ImageShutdownAttachmentsController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $siteSurvey = SiteSurvey::find($id);

        if (!$siteSurvey) {
            return redirect()->route('image-shutdown.index')->with('failed', 'Site Survey not found.');
        }
    
        $files = ImageShutdownAttachments::where('site_survey_id', $id)->get();
    
        return view('ImageShutdownAttachments.index', compact('siteSurvey', 'files'));
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
        //
        try {
            $destinationPath = 'assets/images/';
            if ($request->hasFile('site_file')) {
                $file = $request->file('site_file');
                $filename = time() . '-' . $file->getClientOriginalName();

                $request->file('site_file')->move($destinationPath, $filename);
                $file_path = $destinationPath . $filename;

                // Save file details to the database
                $uploadedFile = ImageShutdownAttachments::create([
                    'file_name' => $filename,
                    'file_path' => $file_path,
                    'description' => $request->description,
                    'site_survey_id' => $request->id
                ]);

                return redirect()->route('image-shutdown-attachment.index', ['id' => $request->id])->with('success', 'File uploaded successfully.');
            } else {
                return redirect()->route('image-shutdown-attachment.index', ['id' => $request->id])->with('failed', 'No file selected.');
            }
      
        } catch (\Throwable $th) {
            return redirect()->route('image-shutdown-attachment.index', ['id' => $request->id])->with('failed', 'Request Failed: ' . $th->getMessage());
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
        $file = ImageShutdownAttachments::findOrFail($id);

        if (file_exists(public_path($file->file_path))) {
            unlink(public_path($file->file_path));
        } 
        $file->delete();

        return redirect()->back()->with('success', 'File deleted successfully.');
    }
}
