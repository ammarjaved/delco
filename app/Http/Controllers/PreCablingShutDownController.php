<?php

namespace App\Http\Controllers;

use App\Models\PreCablingShutDown;
use App\Models\SiteSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreCablingShutDownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $nama_pe = SiteSurvey::findOrFail($id)->nama_pe;
        return view('PreCablingShutDown.create', ['site_survey_id' => $id,'nama_pe'=>$nama_pe]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //code...

            $request['created_by'] = Auth::user()->name;
            PreCablingShutDown::create($request->all());

        } catch (\Throwable $th) {
            return redirect()->route('pre-cabling.index')->with('failed', 'Request Failed');

        }

        return redirect()->route('pre-cabling.index')->with('success', 'Request Success');
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
        $piw = PreCablingShutDown::find($id);
        return $piw ? view('PreCablingShutDown.create',['piw'=>$piw]) : abort(404);
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
        try {
 
            $preCabling = PreCablingShutDown::find($id);
            if (!$preCabling) {
                 abort(404);
            }
                 $preCabling->update($request->all());
 
         } catch (\Throwable $th) {
             return redirect()->route('pre-cabling.index')->with('failed', 'Request Failed');
 
         }
 
         return redirect()->route('pre-cabling.index')->with('success', 'Request Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $shutDown = PreCablingShutDown::findOrFail($id);
            $shutDown->delete();
        } catch (\Throwable $th) {
            return redirect()->route('pre-cabling.index')->with('failed', 'Request Failed');
        }

        return redirect()->route('pre-cabling.index')->with('success', 'Request Success');
    }
}
