<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;



use App\Models\material;
use App\Models\ProjectMaterial;
use Illuminate\Http\Request;
use App\Models\SiteSurvey;
use Illuminate\Support\Facades\DB;
use Exception;




class MaterialSelectionController extends Controller
{
    public function index(Request $request)
    {
        $siteSurvey = SiteSurvey::find($request->id);

        // return $siteSurvey;
    
        // Handle the case where SiteSurvey is not found
        // if (!$siteSurvey) {
        //     return redirect()->route('material-selection.index')->with('error', 'Site Survey not found.');
        // }
    
        // $query = material::query();
    
        // if ($request->has('search')) {
        //     $search = $request->input('search');
        //     $query->where('mat_code', 'LIKE', "%{$search}%")
        //           ->orWhere('mat_desc', 'LIKE', "%{$search}%");
    
        // $materials = $query->get();
    
        //  return view('material-selection.index', compact('materials', 'siteSurvey'));
        // }else{
            return view('material-selection.index',compact('siteSurvey'));
 
     //   }
    }

    public function searchMaterial(Request $request){
        $query = material::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('mat_desc', 'LIKE', "%{$search}%");
                 // ->orWhere('mat_desc', 'LIKE', "%{$search}%");
        }
    
        return $materials = $query->limit(100)->pluck('mat_desc')->toArray();
    }

    public function materialData(Request $request){
        $query = material::query();
        if ($request->has('desc')) {
            $search = $request->input('desc');
            $query->where('mat_desc', 'LIKE', "%{$search}%");
                 // ->orWhere('mat_desc', 'LIKE', "%{$search}%");
        }
    
        return $materials = $query->get();
    }

    // public function searchResult(Request $request)
    // {
    //     $siteSurvey = SiteSurvey::find($request->id);
    
    //     // Handle the case where SiteSurvey is not found
    //     if (!$siteSurvey) {
    //         return redirect()->route('material-selection.index')->with('error', 'Site Survey not found.');
    //     }
    
    //     $query = material::query();
    
    //     if ($request->has('search')) {
    //         $search = $request->input('search');
    //         $query->where('mat_code', 'LIKE', "%{$search}%")
    //               ->orWhere('mat_desc', 'LIKE', "%{$search}%");
    //     }
    
    //     $materials = $query->get();
    
    //     return view('material-selection.index', compact('materials', 'siteSurvey'));
    // }


    // app/Http/Controllers/MaterialSelectionController.php

public function format()
{
    $surveys = SiteSurvey::all(); // Adjust the query as needed to fetch the required data
    return view('material-selection.format', compact('surveys'));
}

    

    public function showData($id)
    {
        $data = DB::select(DB::raw("
            WITH foo AS (SELECT * FROM project_material)
            SELECT c.nama_pe, mat_desc, mat_code, bun, a.quantity
            FROM material b
            JOIN foo a ON a.material_id = b.id
            JOIN tbl_site_survey c ON a.site_survey_id = c.id
            WHERE c.id = ?
        "), [$id]);
    
        return view('material-selection.data-table', ['data' => $data]);
    }
    
    

    public function saveSelections(Request $request, $id)
    {
        $siteSurvey = SiteSurvey::find($id);

       // return $request->data;
    
        if (!$siteSurvey) {
            return redirect()->route('material-selection.index')->with('error', 'Site Survey not found.');
        }
    
        $selections = $request->data;
    
        foreach ($selections as $row) {
           // if ($quantity > 0) {
                $username = Auth::user()->name;
    
                ProjectMaterial::create(
                    [
                        'material_id' =>$row['id'],
                        'site_survey_id' => $id,
                        'quantity' => $row['quantity'],
                        'created_by' => $username
                    ]
                );
           // }
        }
    
        return redirect()->route('material-selection.format', ['id' => $id])->with('success', 'Selections saved successfully.');
    }

    public function destroy($id)
    {
        try {
            // Deleting materials related to the specific site survey ID from project_material table
            $materialCount = DB::table('project_material')
                ->where('site_survey_id', $id)
                ->delete();
    
            return redirect()
                ->route('site_survey.index')
                ->with('success', "$materialCount Material(s) successfully deleted for Site Survey ID $id");
        } catch (Exception $e) {
            return redirect()
                ->route('site_survey.index')
                ->with('failed', 'Failed to delete materials: ' . $e->getMessage());
        }
    }
    



    


    
}