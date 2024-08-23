<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;



use App\Models\material;
use App\Models\ProjectMaterial;
use Illuminate\Http\Request;
use App\Models\SiteSurvey;


class MaterialSelectionController extends Controller
{
    public function index(Request $request)
    {

      //  return $request->id;
        $query = material::query();
        $siteSurvey = SiteSurvey::find($request->id);
        

     
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('mat_code', 'LIKE', "%{$search}%")
                  ->orWhere('mat_desc', 'LIKE', "%{$search}%");
        }

        $materials = $query->get();

        return view('material-selection.index', compact('materials','siteSurvey'));
    }

    public function saveSelections(Request $request,$id)
    {

        //return $id;
        $selections = $request->input('selections', []);


        foreach ($selections as $materialId => $quantity) {
            if ($quantity > 0) {
                $username = Auth::user()->name;
                
                ProjectMaterial::updateOrCreate(
                    [
                        'material_id' => $materialId,
                        'site_survey_id' => $id  // Move this to the first array
                    ],
                    [
                        'quantity' => $quantity,
                        'created_by' => $username  // Assuming you want to save the username
                    ]
                );
            }
        }

        return redirect()->route('material-selection.index')->with('success', 'Selections saved successfully.');
    }
}