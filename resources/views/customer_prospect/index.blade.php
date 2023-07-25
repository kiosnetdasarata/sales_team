@extends('layouts.master')
    @section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Data Customer </h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">

                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-customer-prospect">TAMBAH</a>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                
                                    <th>Nama Customer</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telepon</th>
                                    <th>Metode Bertemu</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-customer">
                                @foreach($customers as $customer)
                                <tr id="index_{{ $customer->id }}">
                                    <td>{{ $customer->nama }}</td>
                                    <td>{{ $customer->alamat }}</td>
                                    <td>{{ $customer->no_tlpn }}</td>
                                    
                                    <td>{{ $customer->metode_bertemu->metode_bertemu}}</td>
                                    <td>{{ $customer->status->status }}</td>
                                    <td class="text-center">
                                        
                                        <a href="javascript:void(0)" id="btn-edit-customer-prospect" data-id="{{ $customer->id }}" class="btn btn-primary btn-sm">EDIT</a>
                                        <a href="javascript:void(0)" id="btn-delete-customer-prospect" data-id="{{ $customer->id }}" class="btn btn-danger btn-sm">DELETE</a>
                                        
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
        @include('customer_prospect.create')
        @include('customer_prospect.edit')
        @include('customer_prospect.delete')
        
@endsection