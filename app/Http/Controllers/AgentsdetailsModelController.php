<?php

namespace App\Http\Controllers;

use App\Models\agentsdetailsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentsdetailsModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $agents=DB::table('users')
        ->leftJoin('agentsdetails_models', 'users.id', '=','agentsdetails_models.uid')
        ->select(
            'users.id as id',
            'name',
            'allowcredit','noallocated', 'noused', 'status','access_token'
            
        )->where('role', 'agent')->get(); 


        return view('usermgmgt.listagent', compact('agents'));
    }



    public function agentprofile(Request $request)
    {
        //
       // dd($request);
        $user=User::where('id', $request->uid)->first();
        $agent=agentsdetailsModel::where('uid',$request->uid)->first();

        return view('usermgmgt.agentdetails' ,compact('user','agent'));
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
    public function show(agentsdetailsModel $agentsdetailsModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(agentsdetailsModel $agentsdetailsModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, agentsdetailsModel $agentsdetailsModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(agentsdetailsModel $agentsdetailsModel)
    {
        //
    }
}
