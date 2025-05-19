<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\agentsdetailsModel;

class UserController extends Controller
{
    /**
     * Display a listing of all users.
     */
    public function index()
    {
        //
        $users=User::all();

        return view('usermgmgt.listusers', compact('users'));
    }

        public function updateuser(Request $request)
    {
        //
        $user=User::where('id',$request->uid)->first();

        $adetail=agentsdetailsModel::where('uid',$user->id)->first();

        if ($request->role!=='agent' && !empty($adetail) ){
            
            $adetail->status='deactivated';
            $adetail->save();

        }

        

        $user->role=$request->role;
        $user->save();
        if ($user->role=='agent') {
            # check if a record exists in the agents table and create
            if (empty($adetail)) {
                # no agent record exist create...
                $agentdetail=new agentsdetailsModel();
                $agentdetail->uid=$user->id;
                $agentdetail->status='activated';
                 $agentdetail->save();

            } else {
                # code...
                $adetail->status='deactivated';
                $adetail->save();
            }
           
        }


       

        $users=User::all();

        return view('usermgmgt.listusers', compact('users'));
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
