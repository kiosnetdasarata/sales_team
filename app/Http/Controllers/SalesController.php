<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerClosing;
use App\Models\CustomerProspect;
use Illuminate\Routing\Controller;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer_prospect = CustomerProspect::where('status_id','2')->orWhere('status_id','1')->count();
        $customer_prospect_uncover = CustomerProspect::where('status_id','4')->count();
        $customer_closing = CustomerClosing::count();
        $title='dashboard';
        //$kategoris = Kategori::orderBy('id_kategori', 'asc')->paginate(10);
        return view('sales_dashboard.index', compact('customer_prospect','customer_prospect_uncover','customer_closing','title'));
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
