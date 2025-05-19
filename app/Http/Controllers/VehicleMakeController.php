<?php

namespace App\Http\Controllers;

use App\Models\vehicleMake;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\vehicleMakeImport;


class VehicleMakeController extends Controller
{
    public function importvmake(Request $request)
    {

        $request->validate([
            'vmakeimport' => 'required|max:2048|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new vehicleMakeImport, $request->file('vmakeimport'));

        return back()->with('success', 'Vehicle Makes imported successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $vmakes=vehicleMake::all();

        return view('codes.vehiclemakes', compact('vmakes'));
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
    public function show(vehicleMake $vehicleMake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vehicleMake $vehicleMake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vehicleMake $vehicleMake)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vehicleMake $vehicleMake)
    {
        //
    }
}
