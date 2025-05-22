<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\agentsdetailsModel;
use App\Models\policy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
                    Auth::check();
                    $usercheck = Auth::user();
                    switch ($usercheck->role) {
                        case 'agent':
                            # code...
                                                  # get credit left
                    $agent=agentsdetailsModel::where('uid',$usercheck->id)->first();
                    $creditleft=$agent->noallocated - $agent->noused;

                    #get No of Policies
                    $totalpolcount=policy::where('agent_id', $usercheck->id)->count();
                    $totalpoldraft=policy::where('agent_id', $usercheck->id)->where('status', 'draft')->count();
                    $totalpolfailed=policy::where('agent_id', $usercheck->id)->where('status', 'failed')->count();
                    $totalpolapproved=policy::where('agent_id', $usercheck->id)->where('status', 'approved')->count();
                    $policygroup=policy::select('producttype', DB::raw('count(*) as total'))->where('status', 'approved')->where('agent_id', $usercheck->id)
                    ->groupBy('producttype')->get();

                            break;
                    case 'admin':
                                # code...
                    # get credit lef
                    $creditleft=0;

                    #get No of Policies
                    $totalpolcount=policy::all()->count();
                    $totalpoldraft=policy::all()->where('status', 'draft')->count();
                    $totalpolfailed=policy::all()->where('status', 'failed')->count();
                    $totalpolapproved=policy::all()->where('status', 'approved')->count();
                    $policygroup=policy::select('producttype', DB::raw('count(*) as total'))->where('status', 'approved')
                    ->groupBy('producttype')->get();
                            break;
                    case 'superadmin':
                                # code...
                                        # get credit lef
                    $creditleft=0;

                    #get No of Policies
                    $totalpolcount=policy::all()->count();
                    $totalpoldraft=policy::all()->where('status', 'draft')->count();
                    $totalpolfailed=policy::all()->where('status', 'failed')->count();
                    $totalpolapproved=policy::all()->where('status', 'approved')->count();
                    $policygroup=policy::select('producttype', DB::raw('count(*) as total'))->where('status', 'approved')
                    ->groupBy('producttype')->get();
                            break;
                    case 'user':
                                # code...
                    $creditleft=0;

                    #get No of Policies
                    $totalpolcount=policy::where('insured_id', $usercheck->id)->count();
                    $totalpoldraft=policy::where('insured_id', $usercheck->id)->where('status', 'draft')->count();
                    $totalpolfailed=policy::where('insured_id', $usercheck->id)->where('status', 'failed')->count();
                    $totalpolapproved=policy::where('insured_id', $usercheck->id)->where('status', 'approved')->count();
                    $policygroup=policy::select('producttype', DB::raw('count(*) as total'))->where('status', 'approved')->where('insured_id', $usercheck->id)
                    ->groupBy('producttype')->get();
                            break;
                        default:
                            # code...
                            break;
                    }
 
                    

                    

        return view('dashboardnew', compact('creditleft','totalpolcount','totalpoldraft','totalpolfailed','totalpolapproved','policygroup', 'usercheck'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
