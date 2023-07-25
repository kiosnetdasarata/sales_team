<?php

namespace App\Http\Controllers;

use App\Models\CustomerClosing;
use App\Models\CustomerProspect;
use App\Models\District;
use App\Models\Program;
use App\Models\Province;
use App\Models\Regencie;
use App\Models\ServicePackage;
use App\Models\Village;
use Illuminate\Http\Request;

class CustomerClosingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = CustomerClosing::with('customer_prospect','program','service_package','province','regencie','district','village')->get();
        $prospects = CustomerProspect::where('status_id', '2')->get();
        $pakets = ServicePackage::latest()->get();
        $programs = Program::latest()->get();
        $provinces = Province::get();
        // $metode_bertemu = MetodeBertemu::get();
        $title='customer closing';
        return view('customer_closing.index', compact('customers','pakets','programs','prospects','provinces','title'));
    }

    /**
     * Show the form for creating a new resource.
     */

     public function fetchregencies(Request $request)
    {
         
        $data['regencie'] = Regencie::where('province_id',$request->province_id)->get();
        return response()->json($data);
    }
    public function fetchdistrict(Request $request)
    {
         
        $data['district'] = District::where('regencies_id',$request->regencie_id)->get();
        return response()->json($data);
    }
    public function fetchvillage(Request $request)
    {
         
        $data['village'] = Village::where('district_id',$request->district_id)->get();
        return response()->json($data);
    }
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
