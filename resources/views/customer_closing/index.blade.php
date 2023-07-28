@extends('layouts.master')
    @section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Data Customer</h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                  
                    <div class="card-body">

                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-customer-closing">TAMBAH</a>

                        <table class="table table-bordered table-striped" style="font-size: 15px;">
                            <thead>
                                <tr style="text-align: center;">
                                
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
                                        <a href="#ktp">
                                            <img class="thumb" src=" {{'img/foto_ktp'.'/'.$customer->fto_ktp }}">
                                        </a>
                                        <div class="overlay" id="ktp">
                                            <a href="#" class="close">
                                                <svg style="width:47px;height:47px" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                                </svg>
                                            </a>
                                            <h3 style="color: aliceblue"> Foto KTP {{$customer->customer_prospect->nama}}</h3>
                                            <img src="{{'img/foto_ktp'.'/'. $customer->fto_ktp }}" >
                                        </div>
                                        
                                    </td>
                                    <td>
                                        <a href="#rumah">
                                            <img class="thumb" src=" {{'img/foto_rumah'.'/'.$customer->fto_rumah }}">
                                        </a>
                                        <div class="overlay" id="rumah">
                                            <a href="#" class="close">
                                                <svg style="width:47px;height:47px" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                                </svg>
                                            </a>
                                            <h3 style="color: aliceblue"> Foto Rumah {{$customer->customer_prospect->nama}}</h3>
                                            <img src="{{'img/foto_rumah'.'/'. $customer->fto_rumah }}" >
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        
                                        <a href="{{ url('edit/'.$customer->id) }}" id="btn-edit-customer-closing" class="btn btn-primary btn-sm">EDIT</a>
                                        
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
        
        
@endsection