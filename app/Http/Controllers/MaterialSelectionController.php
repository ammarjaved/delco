<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;



use App\Models\material;
use App\Models\ProjectMaterial;
use Illuminate\Http\Request;

class MaterialSelectionController extends Controller
{
    public function index(Request $request)
    {
        $query = material::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('mat_code', 'LIKE', "%{$search}%")
                  ->orWhere('mat_desc', 'LIKE', "%{$search}%");
        }

        $materials = $query->get();

        return view('material-selection.index', compact('materials'));
    }

    public function saveSelections(Request $request)
    {
        $selections = $request->input('selections', []);

        foreach ($selections as $materialId => $quantity) {
            if ($quantity > 0) {
                $username=\Auth::user()->name;
                //return $username;
                ProjectMaterial::updateOrCreate(
                    ['material_id' => $materialId],
                    ['quantity' => $quantity]
                );
            }
        }

        return redirect()->route('material-selection.index')->with('success', 'Selections saved successfully.');
    }
}