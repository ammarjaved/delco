<?php

namespace App\Http\Controllers;

use App\Models\PreCablingImages;
use App\Models\SiteSurvey;
use Illuminate\Http\Request;

class PreCablingImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $survey = SiteSurvey::findOrFail($id);
        $imageShutdowns = PreCablingImages::where('site_survey_id', $id)->get(); // Get related image shutdowns

        return view('PreCablingImages.index', [
            'survey' => $survey,
            'imageShutdowns' => $imageShutdowns,
        ]);
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
            //code...
            //         $request->validate([
            //             'image_name' => 'required|string|max:255',
            //             'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            //             'site_survey_id' => 'required|exists:tbl_site_survey,id',
            //         ]);

            $imagePath = '';
            $destinationPath = 'assets/images/';
            if ($request->hasFile('image_url')) {
                $file = $request->file('image_url');
                $filename = time() . '-' . $file->getClientOriginalName();

                $request->file('image_url')->move($destinationPath, $filename);
                $imagePath = $destinationPath . $filename;
            }

            // Create the ImageShutdown record
            PreCablingImages::create([
                'image_name' => $request->input('image_name'),
                'image_url' => $imagePath,
                'site_survey_id' => $request->input('site_survey_id'),
                'image_desc'=>$request->input('image_desc'),
                'created_by' => auth()->user()->id,
            ]);

            // Redirect with success message
            return redirect()
                ->route('pre-cabling-image.index', ['id' => $request->site_survey_id])
                ->with('success', 'Image uploaded successfully.');
        } catch (\Throwable $th) {
            return $th->getMessage();
            return redirect()
                ->route('pre-cabling-image.index', ['id' => $request->site_survey_id])
                ->with('failed', 'Image uploading failed.');
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
        $imageShutdown = PreCablingImages::findOrFail($id);
        return view('PreCablingImages.edit', compact('imageShutdown'));
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
        $imageShutdown = PreCablingImages::findOrFail($id);
        
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

        return redirect()->route('pre-cabling-image.index', $imageShutdown->site_survey_id)
                         ->with('success', 'Image Shutdown updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imageShutdown = PreCablingImages::findOrFail($id);
        $imageShutdown->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
