<?php

namespace App\Http\Controllers;

use App\Models\PreCabling;
use App\Models\SiteSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\SiteVisitRepository;


class PreCablingController extends Controller
{

    private $siteRepository;

    public function __construct(SiteVisitRepository $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = SiteSurvey::with(['PreCabling', 'PreCablingShutDown'])->get();
        return view('PreCabling.index', ['surveys' => $data]);
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
        return view('PreCabling.create', ['site_survey_id' => $id,'nama_pe'=>$nama_pe]);
    }


    public function createToolboxTalk()
    {
        return view('PreCabling.toolboxtalk');
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
              return  $request;
            $request['created_by'] = Auth::user()->name;
            PreCabling::create($request->all());
        } catch (\Throwable $th) {
            return redirect()->route('pre-cabling.index')->with('failed', 'Request Failed');
        }

        return redirect()->route('pre-cabling.index')->with('success', 'Request Success');
    }



    public function storeToolboxtalk(Request $request)
    {
        try {

            $usr_info= Auth::user()->name;
            $toolbox=$this->siteRepository->addToolBoxTalk($request,$siteSurvey->id,$siteSurvey->nama_pe,$usr_info);

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
        //
        $piw = PreCabling::find($id);
        return $piw ? view('PreCabling.create', ['piw' => $piw]) : abort(404);
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
            $preCabling = PreCabling::find($id);
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
            $piw = PreCabling::findOrFail($id); 
            $piw->delete();
        } catch (\Throwable $th) {
            return redirect()->route('pre-cabling.index')->with('failed', 'Request Failed');
        }

        return redirect()->route('pre-cabling.index')->with('success', 'Request Success');
    }
}
