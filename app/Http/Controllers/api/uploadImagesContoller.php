<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SitePicture;
use Illuminate\Http\Request;
use App\Http\Controllers\api\uploadImagesContoller;


class uploadImagesContoller extends Controller
{

    public function uploadImages(Request $req,  $id)
    {
        $success = false;
        $error = null;


        $modelClass = "App\\Models\\SitePicture";
        try {
        $data = $modelClass::where('site_survey_id',$id)->get()[0];
  //return $data;
        if ($data) {
            $destinationPath = 'assets/images/';
            $imageStoreUrlPath = $destinationPath;


            foreach ($req->allFiles() as $key => $file) {
                // Check if the input is a file and it is valid
                if ($req->hasFile($key) && $req->file($key)->isValid()) {
                    $uploadedFile = $req->file($key);
                    $img_ext = $uploadedFile->getClientOriginalExtension();
                    $filename = $key . '-' . strtotime(now()) . rand(10, 100) . '.' . $img_ext;
                    $filePath = $imageStoreUrlPath   . $filename;

                    // Move the file to the first location
                    $fileContents = file_get_contents($uploadedFile->getRealPath());
                    file_put_contents($filePath, $fileContents);
                    // $uploadedFile->move($imageStoreUrlPath, $filename);
                    $data->{$key} = $destinationPath . $filename;


                }

            }
//return $data;
                // foreach ($req->all() as $key => $file) {
                //     // Check if the input is a file and it is valid
                //     if ($req->hasFile($key) && $req->file($key)->isValid()) {
                //         $uploadedFile = $req->file($key);
                //         $img_ext = $uploadedFile->getClientOriginalExtension();
                //         $filename = $key . '-' . strtotime(now()). $data->id . '.' . $img_ext;
                //         $uploadedFile->move($imageStoreUrlPath, $filename);
                //         $data->{$key} = $destinationPath . $filename;
                //     }
                // }
                $data->save();

                $message = 'Images uploaded successfully';
                $success = true;
                $status = 200;

        } else {
            $message = 'Record not found';
            $status = 404;
        }
    } catch (\Throwable $th) {
        $message = 'Server-side error';
        $status = 500;
        $error = $th->getMessage();
    }

        return response()->json([
            'success' => $success,
            'message' => $message,
            'error' => $error,
        ], $status);
    }
	

//     public function preCblImage(Request $req)
// {
//     $destinationPath = 'assets/images/';
//     $modelClass = "App\\Models\\PreCblImage";

//     $cgeckImg=$modelClass::where('image_name',$req->image_name)->get();
    
    

//     try {

        
//         // Create a new model instance
//         $preCblImage = new $modelClass();
        
//         // Fill the model with all request data
//         $preCblImage->fill($data);
        
//         if ($req->hasFile('image')) {
//             $uploadedFile = $req->file('image');
//             $img_ext = $uploadedFile->getClientOriginalExtension();
//             $filename = 'image' . '-' . strtotime(now()) . rand(10, 100) . '.' . $img_ext;
//             $filePath = public_path($destinationPath . $filename);
            
//             // Move the file to the destination
//             $uploadedFile->move(public_path($destinationPath), $filename);
            
//             // Set the image_url
//             $preCblImage->image_url = $destinationPath . $filename;
//         }
        
//         // Save the model instance with all data
//         $preCblImage->save();

//         return response()->json([
//             'success' => true,
//             'message' => 'Data saved successfully',
//             'error' => null,
//         ], 200);
//     } catch (\Throwable $th) {
//         return response()->json([
//             'success' => false,
//             'message' => 'Server-side error',
//             'error' => $th->getMessage(),
//         ], 500);
//     }
// }


public function shutdownImage(Request $req)
{
    $destinationPath = 'assets/images/';
    $modelClass = "App\\Models\\ImageShutdown";
   // $checkImg = $modelClass::where('image_name', $req->image_name)->where('site_survey_id','=',$req->site_survey_id)->where('image_type','=',$req->image_type)->first();
    
    try {
        $data = $req->all();
        
        // if ($checkImg) {
        //     // Update existing record
        //     $preCblImage = $checkImg;
            
        //     // Check if updated_by is empty and handle accordingly
        //     if (empty($data['updated_by'])) {
        //         // You can either set it to a default value
        //         $data['updated_by'] = $req->created_by;
        //         // Or you can unset it to keep the previous value
        //         // unset($data['updated_by']);
        //     }
        // } else {
            // Create a new model instance
            $preCblImage = new $modelClass();
            
            // For new records, set created_by if it's empty
            if (empty($data['created_by'])) {
                $data['created_by'] = $req->created_by;
                $data['updated_by'] = $req->created_by;
            }
  //      }
        
        // Fill the model with all request data
        $preCblImage->fill($data);
       
        if ($req->hasFile('image')) {
            $uploadedFile = $req->file('image');
            $img_ext = $uploadedFile->getClientOriginalExtension();
            $filename = 'image' . '-' . strtotime(now()) . rand(10, 100) . '.' . $img_ext;
            $filePath = public_path($destinationPath . $filename);
            
            // Move the file to the destination
            $uploadedFile->move(public_path($destinationPath), $filename);
            
            // Set the image_url and image_name
            $preCblImage->image_url = $destinationPath . $filename;
            $preCblImage->image_name = $req->image_name;
            
            // If updating, delete the old image file if it exists

            // if ($checkImg && file_exists(public_path($checkImg->image_url))) {
            //     unlink(public_path($checkImg->image_url));
            // }
        }
     //   return         $preCblImage;
        // Save the model instance with all data
        $preCblImage->save();

        $message ='Data inserted successfully';
        
        return response()->json([
            'success' => true,
            'message' => $message,
            'error' => null,
        ], 200);
    } catch (\Throwable $th) {
        return response()->json([
            'success' => false,
            'message' => 'Server-side error',
            'error' => $th->getMessage(),
        ], 500);
    }
}





public function preCblImage(Request $req)
{
    $destinationPath = 'assets/images/';
    $modelClass = "App\\Models\\PreCblImage";
    $checkImg = $modelClass::where('image_name', $req->image_name)->where('site_survey_id','=',$req->site_survey_id)->first();
    
    try {
        $data = $req->all();
        
        if ($checkImg) {
            // Update existing record
            $preCblImage = $checkImg;
            
            // Check if updated_by is empty and handle accordingly
            if (empty($data['updated_by'])) {
                // You can either set it to a default value
                $data['updated_by'] = $req->created_by;
                // Or you can unset it to keep the previous value
                // unset($data['updated_by']);
            }
        } else {
            // Create a new model instance
            $preCblImage = new $modelClass();
            
            // For new records, set created_by if it's empty
            if (empty($data['created_by'])) {
                $data['created_by'] = $req->created_by;
            }
        }
        
        // Fill the model with all request data
        $preCblImage->fill($data);
       
        if ($req->hasFile('image')) {
            $uploadedFile = $req->file('image');
            $img_ext = $uploadedFile->getClientOriginalExtension();
            $filename = 'image' . '-' . strtotime(now()) . rand(10, 100) . '.' . $img_ext;
            $filePath = public_path($destinationPath . $filename);
            
            // Move the file to the destination
            $uploadedFile->move(public_path($destinationPath), $filename);
            
            // Set the image_url and image_name
            $preCblImage->image_url = $destinationPath . $filename;
            $preCblImage->image_name = $req->image_name;
            
            // If updating, delete the old image file if it exists
            if ($checkImg && file_exists(public_path($checkImg->image_url))) {
                unlink(public_path($checkImg->image_url));
            }
        }
     //   return         $preCblImage;
        // Save the model instance with all data
        $preCblImage->save();

        $message = $checkImg ? 'Data updated successfully' : 'Data inserted successfully';
        
        return response()->json([
            'success' => true,
            'message' => $message,
            'error' => null,
        ], 200);
    } catch (\Throwable $th) {
        return response()->json([
            'success' => false,
            'message' => 'Server-side error',
            'error' => $th->getMessage(),
        ], 500);
    }
}
	
	    public function uploadImagesToolBox(Request $req,  $id, $type)
    {
        $success = false;
        $error = null;


        $modelClass = "App\\Models\\ToolBoxTalk";
        try {
        $data = $modelClass::where('site_survey_id',$id)->where('skop_kerja','=',$type)->get()[0];
		
	//	return $data;

        if ($data) {
            $destinationPath = 'assets/images/';
            $imageStoreUrlPath = $destinationPath;


            foreach ($req->allFiles() as $key => $file) {
                // Check if the input is a file and it is valid
                if ($req->hasFile($key) && $req->file($key)->isValid()) {
                    $uploadedFile = $req->file($key);
                    $img_ext = $uploadedFile->getClientOriginalExtension();
                    $filename = $key . '-' . strtotime(now()) . rand(10, 100) . '.' . $img_ext;
                    $filePath = $imageStoreUrlPath   . $filename;

                    // Move the file to the first location
                    $fileContents = file_get_contents($uploadedFile->getRealPath());
                    file_put_contents($filePath, $fileContents);
                    // $uploadedFile->move($imageStoreUrlPath, $filename);
                    $data->{$key} = $destinationPath . $filename;


                }

            }


                $data->save();

                $message = 'Images uploaded successfully';
                $success = true;
                $status = 200;

        } else {
            $message = 'Record not found';
            $status = 404;
        }
    } catch (\Throwable $th) {
        $message = 'Server-side error';
        $status = 500;
        $error = $th->getMessage();
    }

        return response()->json([
            'success' => $success,
            'message' => $message,
            'error' => $error,
        ], $status);
    }




    public function uploadTiangImages(Request $request , $id){

        $success = false;
        $error = null;



        try {
        $data = Tiang::find($id);

        if ($data) {
            $destinationPath = 'assets/images/';
            $imageStoreUrlPath = config('globals.APP_IMAGES_STORE_URL').$destinationPath;
           // $externalPath = config('globals.APP_IMAGES_STORE_URL_TEMP').'/';


            foreach ($request->all() as $mainkey => $mainvalue) {
                if (is_array($mainvalue)) {
                    $arr = [];
                    if ($data->{$mainkey} != '') {
                        $before = json_decode( $data->{$mainkey});
                        foreach($before as $bKey => $bname){
                            $arr[$bKey]=$bname;
                        }
                    }




                    foreach ($request->allFiles() as $key => $file) {
                        // Check if the input is a file and it is valid
                        if (is_a($file, 'Illuminate\Http\UploadedFile') && $file->isValid()) {
                            $uploadedFile = $file;
                            $img_ext = $uploadedFile->getClientOriginalExtension();
                            $filename = $key . '-' . strtotime(now()) . rand(10, 100) . '.' . $img_ext;

                            $filePath = $imageStoreUrlPath   . $filename;

                            // Move the file to the first location
                            $fileContents = file_get_contents($uploadedFile->getRealPath());
                            file_put_contents($filePath, $fileContents);

                            // Move the file to the first location
                            // $uploadedFile->move($imageStoreUrlPath, $filename);
                            $arr[$key] = $destinationPath.$filename;

                            // Copy the file to the second location
                            // $sourcePath = $imageStoreUrlPath . $filename;
                            // $destinationPath2 = $externalPath . $filename;
                            //  copy($sourcePath, $destinationPath2);
                        }

                    }

                    // foreach ($mainvalue as $key => $file) {
                    //     if (is_a($file, 'Illuminate\Http\UploadedFile') && $file->isValid()) {
                    //         $uploadedFile = $file;
                    //         $img_ext = $uploadedFile->getClientOriginalExtension();
                    //         $filename = $key . '-' . strtotime(now()). $data->id . '.' . $img_ext;

                    //         $uploadedFile->move($imageStoreUrlPath, $filename);
                    //         $arr[$key] = $destinationPath.$filename;


                    //     }
                    // }
                    $data[$mainkey] = json_encode($arr);
                }else{

                    // if (is_a($mainvalue, 'Illuminate\Http\UploadedFile') && $mainvalue->isValid()) {
                    //     $uploadedFile = $mainvalue;
                    //     $img_ext = $uploadedFile->getClientOriginalExtension();
                    //     $filename = $mainkey . '-' . strtotime(now()). $data->id . '.' . $img_ext;
                    //     $uploadedFile->move($imageStoreUrlPath, $filename);
                    //     $data[$mainkey] = $destinationPath.$filename ;
                    // }


                        if (is_a($mainvalue, 'Illuminate\Http\UploadedFile') && $mainvalue->isValid()) {
                            $uploadedFile = $mainvalue;
                            $img_ext = $uploadedFile->getClientOriginalExtension();
                            $filename = $mainkey . '-' . strtotime(now()) . rand(10, 100) . '.' . $img_ext;


                            $filePath = $imageStoreUrlPath   . $filename;

                            // Move the file to the first location
                            $fileContents = file_get_contents($uploadedFile->getRealPath());
                            file_put_contents($filePath, $fileContents);
                            // Move the file to the first location
                            // $uploadedFile->move($imageStoreUrlPath, $filename);
                            $data[$mainkey] = $destinationPath.$filename ;

                            // Copy the file to the second location
                            // $sourcePath = $imageStoreUrlPath . $filename;
                            // $destinationPath2 = $externalPath . $filename;
                            //  copy($sourcePath, $destinationPath2);
                        }



                }
            }

                $data->save();

                $message = 'Images uploaded successfully';
                $success = true;
                $status = 200;

        } else {
            $message = 'Record not found';
            $status = 404;
        }
    } catch (\Throwable $th) {
        $message = 'Server-side error';
        $status = 500;
        $error = $th->getMessage();
    }

        return response()->json([
            'success' => $success,
            'message' => $message,
            'error' => $error,
        ], $status);


    }



}
