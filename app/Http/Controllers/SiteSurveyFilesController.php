<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;
use App\Models\SiteSurvey; // Ensure this model is correct
use Exception;

class SiteSurveyFilesController extends Controller
{
    // Display the file upload form and stored files
    public function index($id)
{
    $siteSurvey = SiteSurvey::find($id);

    if (!$siteSurvey) {
        return redirect()->route('site_survey.index')->with('failed', 'Site Survey not found.');
    }

    $files = FileUpload::where('site_survey_id', $id)->get();

    return view('site_survey.upload_files', compact('siteSurvey', 'files'));
}
    // Store uploaded file and its details
    public function storeViewFiles(Request $request, $id)
    {
        try {
            $destinationPath = 'assets/images/';
            if ($request->hasFile('site_file')) {
                $file = $request->file('site_file');
                $filename = time() . '-' . $file->getClientOriginalName();

                $request->file('site_file')->move($destinationPath, $filename);
                $file_path = $destinationPath . $filename;

                // Save file details to the database
                $user=\Auth::user();
                $uploadedFile = FileUpload::create([
                    'file_name' => $filename,
                    'file_path' => $file_path,
                    'description' => $request->description,
                    'site_survey_id' => $id,
                    'created_by'=>$user->email,
                    'updated_by'=>$user->email,
                    'project'=>$user->project,
                    'area'=>$user->area
                ]);

                return redirect()->route('siteFileUploadView.index', ['id' => $id])->with('success', 'File uploaded successfully.');
            } else {
                return redirect()->route('siteFileUploadView.index', ['id' => $id])->with('failed', 'No file selected.');
            }
        } catch (Exception $e) {
            return redirect()->route('siteFileUploadView.index', ['id' => $id])->with('failed', 'Request Failed: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $file = FileUpload::findOrFail($id);


        // Delete the file from the storage
        if (file_exists(public_path($file->file_path))) {
            unlink(public_path($file->file_path));
        }

        // Delete the record from the database
        $file->delete();

        return redirect()->back()->with('success', 'File deleted successfully.');
    }
    public function show($id)
    {
        $siteSurvey = SiteSurvey::with('fileUploads')->findOrFail($id);
        $files = $siteSurvey->fileUploads;

        return view('site_survey.upload_files', compact('siteSurvey', 'files'));
    }
}


?>