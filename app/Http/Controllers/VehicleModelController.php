<?php

namespace App\Http\Controllers;

use App\Models\vehicleModel;
use Illuminate\Http\Request;
use App\Imports\vehicleModelImport;
use Maatwebsite\Excel\Facades\Excel;

class VehicleModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $vmodels=vehicleModel::all();

        return view('codes.vehiclemodels', compact('vmodels'));
    }

        public function importvmodel(Request $request)
    {

        $request->validate([
            'vmodelimport' => 'required|max:2048|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new vehicleModelImport, $request->file('vmodelimport'));

        return back()->with('success', 'Vehicle Models imported successfully.');
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
    public function show(vehicleModel $vehicleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vehicleModel $vehicleModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vehicleModel $vehicleModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vehicleModel $vehicleModel)
    {
        //
    }
}
