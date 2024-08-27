<?php

namespace App\Http\Controllers;

use App\Models\ImageShutdown;
use App\Models\SiteSurvey; // Ensure this is imported
use Illuminate\Http\Request;

class ImageShutdownController extends Controller
{
    // Method to show the form for creating a new ImageShutdown
    public function create($id)
    {
        $survey = SiteSurvey::findOrFail($id);
        $imageShutdowns = ImageShutdown::where('site_survey_id', $id)->get(); // Get related image shutdowns

        return view('image_shutdown.create', [
            'survey' => $survey,
            'imageShutdowns' => $imageShutdowns
        ]);
    }


    public function index()
    {
        // Fetch surveys from the database, including related ImageShutdown data
        $surveys = SiteSurvey::with(['imageShutdown'])->get(); // Use the correct model and relation

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
        $imagePath = $request->file('image_url')->store('images/shutdown', 'public');
    
        // Create the ImageShutdown record
        ImageShutdown::create([
            'image_name' => $request->input('image_name'),
            'image_url' => $imagePath,
            'image_type' => $request->input('image_type'),
            'site_survey_id' => $request->input('site_survey_id'),
            'created_by' => auth()->user()->id, // Assuming user authentication is set up
        ]);
    
        // Redirect with success message
        return redirect()->route('image-shutdown.index')->with('success', 'Image Shutdown created successfully.');
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
        $imageShutdown->update($request->all());

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

    




    
}
