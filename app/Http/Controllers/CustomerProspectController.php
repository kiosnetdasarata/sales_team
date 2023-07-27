<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerClosing;
use App\Models\CustomerProspect;
use App\Models\MetodeBertemu;
use App\Models\Status;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class CustomerProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = CustomerProspect::with('status','metode_bertemu')->get();
        $status = Status::get();
        $metode_bertemu = MetodeBertemu::get();
        $title='customer prospect';
        return view('customer_prospect.index', compact('customers','title','status','metode_bertemu'));
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
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'alamat'     =>'required',
            'no_tlpn'      => 'required',
            'metode_bertemu'=> 'required',
            'status'    => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        //create post
        CustomerProspect::create([
            'nama' =>  $request->name,
            'alamat'        =>  $request->alamat, 
            'no_tlpn'      =>  $request->no_tlpn,
            'metode_bertemu_id'=> $request->metode_bertemu,
            'status_id'    => $request->status
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerProspect $customerProspect)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data ',
            'data'    => $customerProspect
        ]); 
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
    public function update(Request $request, CustomerProspect $customerProspect)
    {
        
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'no_tlpn'       => 'required',
            'alamat'        => 'required',
            'metode_bertemu'=> 'required',
            'status'        => 'required',
           
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //create post
        $customerProspect->update([
            'nama'              => $request->name, 
            'alamat'            => $request->alamat,
            'no_tlpn'           => $request->no_tlpn,
            'metode_bertemu_id' => $request->metode_bertemu,
            'status_id'         => $request->status
            
        ]);
        
       

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $customerProspect
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CustomerProspect::where('id', $id)->delete();
        
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Customer Berhasil Dihapus!.',
        ]); 
    }
}
