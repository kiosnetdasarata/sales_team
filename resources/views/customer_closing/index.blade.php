@extends('layouts.master')
    @section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Data Customer </h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">

                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-customer-closing">TAMBAH</a>

                        <table class="table table-bordered table-striped" style="font-size: 15px;">
                            <thead>
                                <tr style="text-align: center; font-size: 10px;">
                                
                                    <th>Nama Customer</th>
                                    <th>Paket</th>
                                    <th>Promo</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>jk</th>
                                    <th>Alamat</th>
                                    
                                    <th>Tanggal Lahir</th>
                                    <th>Foto KTP</th>
                                    <th>Foto Rumah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-customer">
                                @foreach($customers as $customer)
                                <tr id="index_{{ $customer->id }}">
                                    <td>{{ $customer->customer_prospect->nama }}</td>
                                    <td>{{$customer->service_package->nama_layanan}}
                                    <td>{{ $customer->program->nama_program }}</td>
                                    <td>{{ $customer->nik }}</td>
                                    <td>{{ $customer->nama }}</td>
                                    <td>{{ $customer->jk }}</td>
                                    <td>{{ $customer->village->nama }},
                                        {{ $customer->district->nama }}, 
                                        {{ $customer->regencie->nama }}, 
                                        {{ $customer->province->nama }}
                                    </td>
                                    
                                    <td>{{ $customer->tgl_lahir }}</td>
                                    <td>
                                        <a href="{{ url('img/foto_ktp').'/'. $customer->fto_ktp }}"> <img  style="max-height: 50px; max-widht:50px;" src="{{ url('img/foto_ktp').'/'. $customer->fto_ktp }}"></a>
                                    </td>
                                    <td>
                                        <a href="{{ url('img/foto_rumah').'/'. $customer->fto_rumah }}"> <img  style="max-height: 50px; max-widht:50px;" src="{{ url('img/foto_rumah').'/'. $customer->fto_rumah }}"></a>
                                    </td>
                                    <td class="text-center">
                                        
                                        <a href="{{ url('edit/'.$customer->id) }}" id="btn-edit-customer-closing" class="btn btn-primary btn-sm">EDIT</a>
                                        <a href="javascript:void(0)" id="btn-delete-customer-closing" data-id="{{ $customer->id }}" class="btn btn-danger btn-sm">DELETE</a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $kategoris->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
        @include('customer_closing.create')
        
        @include('customer_closing.delete')
        
@endsection