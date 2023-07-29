<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Program;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\Regencie;
use Illuminate\Http\Request;
use App\Models\ServicePackage;
use App\Models\CustomerClosing;
use App\Models\CustomerProspect;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class CustomerClosingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $customers  = CustomerClosing::with('customer_prospect','program','service_package','province','regencie','district','village')->get();
        $prospects  = CustomerProspect::where('status_id', '2')->get();
        $prospects2 = CustomerProspect::where('status_id', '3')->get();
        $pakets     = ServicePackage::latest()->get();
        $programs   = Program::latest()->get();
        $provinces  = Province::get();
        $title      ='customer closing';
        return view('customer_closing.index', compact('customers','pakets','programs','prospects','prospects2','provinces','title'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function fetchregencies(Request $request)
    {
        $data['regencie']   = Regencie::where('province_id',$request->province_id)->get();
        return response()->json($data);
    }
    public function fetchdistrict(Request $request)
    {
        $data['district']   = District::where('regencies_id',$request->regencie_id)->get();
        return response()->json($data);
    }
    public function fetchvillage(Request $request)
    {
        $data['village']    = Village::where('district_id',$request->district_id)->get();
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
        $validator = Validator::make($request->all(), [
            'prospect_id'   =>  'required',
            'paket_id'      =>  'required',
            'promo_id'      =>  'required',
            'nik'           =>  'required',
            'nama'          =>  'required',
            'jk'            =>  'required',
            'province_id'   =>  'required',
            'regencies_id'  =>  'required',
            'district_id'   =>  'required',
            'village_id'    =>  'required',
            'tgl_lahir'     =>  'required',
            'foto_ktp'      =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_rumah'    =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if ($request->hasFile('foto_ktp')) {
            $file = $request->file('foto_ktp');
            $foto_ktp = time() . '.' . $file->extension();
            $file->move(public_path('img/foto_ktp'), $foto_ktp);
            // if ($emp->avatar) {
            //     Storage::delete('public/images/' . $emp->foto);
            // }
        } 
        if ($request->hasFile('foto_rumah')) {
            $file = $request->file('foto_rumah');
            $foto_rumah = time() . '.' . $file->extension();
            $file->move(public_path('img/foto_rumah'), $foto_rumah);
            // if ($emp->avatar) {
            //     Storage::delete('public/images/' . $emp->foto);
            // }
        } 
        $count_customer = CustomerClosing::count();
        $current = Carbon::now()->format('dmy');
        $format_id = $current.$count_customer+1;
        //create post
        CustomerClosing::create([
            'id'            => $format_id,
            'prospect_id'   => $request->prospect_id,
            'paket_id'      => $request->paket_id,
            'promo_id'      => $request->promo_id,
            'nik'           => $request->nik,
            'nama'          => $request->nama,
            'jk'            => $request->jk,
            'provinsi_id'   => $request->province_id,
            'kota_id'       => $request->regencies_id,
            'kecamatan_id'  => $request->district_id,
            'dusun_id'      => $request->village_id,
            'tgl_lahir'     => $request->tgl_lahir,
            'fto_ktp'      => $foto_ktp,
            'fto_rumah'    => $foto_rumah,
        ]);
        CustomerProspect::where('id',$request->prospect_id)->update([
            'status_id' => '3'
            ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerClosing $customer_closing)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data',
            'data'    => $customer_closing,
            
        ]); 
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        

        $customer_closing = CustomerClosing::where('id',$id)->with('customer_prospect','program','service_package','province','regencie','district','village')->get();
        $customer_closings = CustomerClosing::where('id',$id)->with('customer_prospect','program','service_package','province','regencie','district','village')->first();
       
        $provinces = FacadesDB::table('provinces')->orderBy('id','ASC')->get();
        
        $regencies = FacadesDB::table('regencies')->where('province_id',$customer_closings->provinsi_id)->get();        
        
        
        $districts = FacadesDB::table('districts')->where('regencies_id',$customer_closings->kota_id)->get();        

        $villages = FacadesDB::table('villages')->where('district_id',$customer_closings->kecamatan_id)->get();        
        $pakets = ServicePackage::latest()->get();
        $programs = Program::latest()->get();

        
        $title='customer closing';

        return view('customer_closing.edit', compact('customer_closing','title', 'programs', 'provinces', 'regencies','districts','villages','pakets'));
    
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        if ($request->foto_ktp==''&& $request->foto_rumah=='') {
            $validator = Validator::make($request->all(), [
                'prospect_id'   => 'required',
                'paket_id'      =>'required',
                'promo_id'      => 'required',
                'nik'           => 'required',
                'nama'          => 'required',
                'jk'            => 'required',
                'province_id'   => 'required',
                'regencies_id'  => 'required',
                'district_id'   => 'required',
                'village_id'    => 'required',
                'tgl_lahir'     => 'required',
                
    
            ]);
    
            //check if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            CustomerClosing::where('id',$id)->update([
                'prospect_id'   => $request->prospect_id,
                'paket_id'      =>$request->paket_id,
                'promo_id'      => $request->promo_id,
                'nik'           => $request->nik,
                'nama'          => $request->nama,
                'jk'            => $request->jk,
                'provinsi_id'   => $request->province_id,
                'kota_id'       => $request->regencies_id,
                'kecamatan_id'  => $request->district_id,
                'dusun_id'      => $request->village_id,
                'tgl_lahir'     => $request->tgl_lahir,
                ]);
        }
        elseif($request->foto_ktp!=''&& $request->foto_rumah==''){
            $validator = Validator::make($request->all(), [
                'prospect_id'   => 'required',
                'paket_id'      => 'required',
                'promo_id'      => 'required',
                'nik'           => 'required',
                'nama'          => 'required',
                'jk'            => 'required',
                'province_id'   => 'required',
                'regencies_id'  => 'required',
                'district_id'   => 'required',
                'village_id'    => 'required',
                'tgl_lahir'     => 'required',
                'foto_ktp'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            //check if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            File::delete('img/foto_ktp/'.$request->foto_ktp_lama);
           
            if ($request->hasFile('foto_ktp')) {
                $file = $request->file('foto_ktp');
                $foto_ktp = time() . '.' . $file->extension();
                $file->move(public_path('img/foto_ktp'), $foto_ktp);
                
            } 
            
            CustomerClosing::where('id',$id)->update([
                'prospect_id'   => $request->prospect_id,
                'paket_id'      => $request->paket_id,
                'promo_id'      => $request->promo_id,
                'nik'           => $request->nik,
                'nama'          => $request->nama,
                'jk'            => $request->jk,
                'provinsi_id'   => $request->province_id,
                'kota_id'       => $request->regencies_id,
                'kecamatan_id'  => $request->district_id,
                'dusun_id'      => $request->village_id,
                'tgl_lahir'     => $request->tgl_lahir,
                'fto_ktp'       => $foto_ktp,
                
            ]);
        }
        elseif($request->foto_ktp==''&& $request->foto_rumah!=''){
            $validator = Validator::make($request->all(), [
                'prospect_id'   => 'required',
                'paket_id'      => 'required',
                'promo_id'      => 'required',
                'nik'           => 'required',
                'nama'          => 'required',
                'jk'            => 'required',
                'province_id'   => 'required',
                'regencies_id'  => 'required',
                'district_id'   => 'required',
                'village_id'    => 'required',
                'tgl_lahir'     => 'required',
                'foto_rumah'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                
    
            ]);
    
            //check if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            File::delete('img/foto_rumah/'.$request->foto_rumah_lama);
            if ($request->hasFile('foto_rumah')) {
                $file = $request->file('foto_rumah');
                $foto_rumah = time() . '.' . $file->extension();
                $file->move(public_path('img/foto_rumah'), $foto_rumah);
                
            } 
            
            CustomerClosing::where('id',$id)->update([
                'prospect_id'   => $request->prospect_id,
                'paket_id'      => $request->paket_id,
                'promo_id'      => $request->promo_id,
                'nik'           => $request->nik,
                'nama'          => $request->nama,
                'jk'            => $request->jk,
                'provinsi_id'   => $request->province_id,
                'kota_id'       => $request->regencies_id,
                'kecamatan_id'  => $request->district_id,
                'dusun_id'      => $request->village_id,
                'tgl_lahir'     => $request->tgl_lahir,
                'fto_rumah'     => $foto_rumah,
                
            ]);
        }
        else{
            $validator = Validator::make($request->all(), [
                'prospect_id'   => 'required',
                'paket_id'      => 'required',
                'promo_id'      => 'required',
                'nik'           => 'required',
                'nama'          => 'required',
                'jk'            => 'required',
                'province_id'   => 'required',
                'regencies_id'  => 'required',
                'district_id'   => 'required',
                'village_id'    => 'required',
                'tgl_lahir'     => 'required',
                'foto_ktp'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'foto_rumah'    =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                
    
            ]);
    
            //check if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            File::delete('img/foto_ktp/'.$request->foto_ktp_lama);
            File::delete('img/foto_rumah/'.$request->foto_rumah_lama);
            if ($request->hasFile('foto_ktp')) {
                $file = $request->file('foto_ktp');
                $foto_ktp = time() . '.' . $file->extension();
                $file->move(public_path('img/foto_ktp'), $foto_ktp);
            } 
            if ($request->hasFile('foto_rumah')) {
                $file = $request->file('foto_rumah');
                $foto_rumah = time() . '.' . $file->extension();
                $file->move(public_path('img/foto_rumah'), $foto_rumah);
                
            } 
            //create post
            CustomerClosing::where('id',$id)->update([
                'prospect_id'   => $request->prospect_id,
                'paket_id'      => $request->paket_id,
                'promo_id'      => $request->promo_id,
                'nik'           => $request->nik,
                'nama'          => $request->nama,
                'jk'            => $request->jk,
                'provinsi_id'   => $request->province_id,
                'kota_id'       => $request->regencies_id,
                'kecamatan_id'  => $request->district_id,
                'dusun_id'      => $request->village_id,
                'tgl_lahir'     => $request->tgl_lahir,
                'fto_ktp'       => $foto_ktp,
                'fto_rumah'     => $foto_rumah,
            ]);
        }
        
       
        return redirect()->route('customer_closing');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $image = CustomerClosing::find($id);
        // File::delete('img/foto_ktp/'.$image->fto_ktp);
        // File::delete('img/foto_rumah/'.$image->fto_rumah);
        // CustomerClosing::where('id', $id)->delete();
        
        // //return response
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data Customer Berhasil Dihapus!.',
        // ]); 
    }
}
