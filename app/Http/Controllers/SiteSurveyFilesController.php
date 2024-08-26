<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;
use Exception;
use Illuminate\Support\Facades\DB;


class SiteSurveyFilesController extends Controller
{


public function index(){
    $surveys = FileUpload::all();
    return view('site_survey.fileupload');
}

    public function storeViewFiles(Request $request,$id){
        // $request->validate([
        //     'file' => 'required|file|mimes:pdf,docx,png|max:2048',
        //     'description' => 'required|string|max:255',
        // ]);

      // return $id;
      try{
        $destinationPath = 'assets/images/';
        if ($request->hasFile('site_file')) {
            $file = $request->file('site_file');
            $filename = time() . '-' . $file->getClientOriginalName();
           
            // $path = $file->storeAs('public/files', $filename);
            $img_ext =$request->file('site_file')->getClientOriginalExtension();
            $request->file('site_file')->move($destinationPath, $filename);
           // $pictureData[$field] = $request->file($field)->store('images', 'public');
           $file_path=$destinationPath.$filename;
            // Save file details to the database
            $uploadedFile = FileUpload::create([
                'file_name' => $filename,
                'file_path' => $file_path,
                'description' => $request->description,
                'site_survey_id'=> $id
            ]);

            
        }
        return  $uploadedFile;
    }
    catch(Exception $e){
        return $e->getMessage();
            return redirect()
                ->route('site-data-collection.index')
                ->with('failed', 'Request Failed');
        }
    
    }
}
