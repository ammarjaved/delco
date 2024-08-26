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
    
        // Handle the case where SiteSurvey is not found
        if (!$siteSurvey) {
            return redirect()->route('material-selection.index')->with('error', 'Site Survey not found.');
        }
    
        $query = material::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('mat_code', 'LIKE', "%{$search}%")
                  ->orWhere('mat_desc', 'LIKE', "%{$search}%");
        }
    
        $materials = $query->get();
    
        return view('material-selection.index', compact('materials', 'siteSurvey'));
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
    
        if (!$siteSurvey) {
            return redirect()->route('material-selection.index')->with('error', 'Site Survey not found.');
        }
    
        $selections = $request->input('selections', []);
    
        foreach ($selections as $materialId => $quantity) {
            if ($quantity > 0) {
                $username = Auth::user()->name;
    
                ProjectMaterial::updateOrCreate(
                    [
                        'material_id' => $materialId,
                        'site_survey_id' => $id
                    ],
                    [
                        'quantity' => $quantity,
                        'created_by' => $username
                    ]
                );
            }
        }
    
        return redirect()->route('material-selection.index', ['id' => $id])->with('success', 'Selections saved successfully.');
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