@extends('layouts.master')
    @section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            
            <a style="float: right;" href="{{ url('/customer_closing') }}" class="btn btn-primary mb-3">
                <i class="bi bi-arrow-left nav_icon"></i> </a>
           
            <div class="col-md-12">
                @foreach ($customer_closing as $customer_closings)
                <h4 class="text-center">Edit Data Customer </h4>
            <form {{route('update_customer_closing', ["id" => $customer_closings->id])}} name="form_edit" id="form_edit" method="POST" enctype="multipart/form-data"> 
                
            @csrf
            @method('put')
            <div class="modal-body">   
                <input type="hidden" name="id" id="id" value="{{$customer_closings->id}}">
                <div class="form-group">
                    <label for="name" class="control-label">Nama Customer Closing</label>
                    <select class="select2 form-control" disabled="true">
                        <option value="{{ $customer_closings->prospect_id }}">{{ $customer_closings->customer_prospect->nama }}</option>
                    </select>
                    <input type="hidden" name="prospect_id" id="prospect_id" value="{{$customer_closings->prospect_id}}">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Nama Paket</label>
                        <select class="select2 form-control" name="paket_id" id="paket_id-edit">
                            <option disabled selected>--pilih Paket--</option>
                            @foreach ($pakets as $paket)
                                <option value="{{ $paket->id }}" 
                                    @if($paket->id == $customer_closings->paket_id)  {

                                    '' selected } @endif>{{ $paket->nama_layanan }}</option>
                            @endforeach
                            
                        </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                    </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Nama Promo</label>
                            <select class="select2 form-control" name="promo_id" id="promo_id-edit">
                                <option disabled selected>--pilih Promo--</option>
                                @foreach ($programs as $program)
                                <option value="{{ $program->id }}" 
                                @if($program->id == $customer_closings->paket_id)  {

                                '' selected } @endif>{{ $program->nama_program }}</option>
                            @endforeach
                            </select>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">NIK </label>
                            <input type="text" class="form-control" name="nik" id="nik-edit" value="{{$customer_closings->nik}}">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Nama </label>
                            <input type="text" class="form-control" name="nama" id="nama-edit" value="{{$customer_closings->nama}}">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">JK </label>
                            <select class="select2 form-control" name="jk" id="jk-edit">
                                <option value="Laki-Laki" @if('Laki-Laki' == $customer_closings->jk)  {

                                    '' selected } @endif>Laki-laki</option>
                                <option value="Perempuan" @if('Perempuan' == $customer_closings->jk)  {

                                    '' selected } @endif>Perempuan</option>
                            </select>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Province</label>
                            <select class="select2 form-control" name="province_id" id="province_id-edit">
                                <option disabled selected>--Select Province--</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}"@if($province->id == $customer_closings->provinsi_id)  {

                                        '' selected } @endif>{{ $province->nama }}</option>
                                @endforeach
                            </select>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Kota</label>
                            <select class="select2 form-control" name="regencies_id" id="regencies_id-edit">
                                @if (!empty($regencies))
                                    @foreach ($regencies as $regencie)
                                        <option {{ ($customer_closings->kota_id == $regencie->id) ? 'selected' : '' }} value="{{ $regencie->id }}">{{ $regencie->nama }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Kecamatan</label>
                            <select class="select2 form-control" name="district_id" id="district_id-edit">
                                @if (!empty($districts))
                                @foreach ($districts as $district)
                                    <option {{ ($customer_closings->kecamatan_id == $district->id) ? 'selected' : '' }} value="{{ $district->id }}">{{ $district->nama }}</option>
                                @endforeach
                            @endif
                            </select>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Dusun</label>
                            <select class="select2 form-control" name="village_id" id="village_id-edit">
                                @if (!empty($villages))
                                @foreach ($villages as $village)
                                    <option {{ ($customer_closings->dusun_id == $village->id) ? 'selected' : '' }} value="{{ $village->id }}">{{ $village->nama }}</option>
                                @endforeach
                            @endif
                            </select>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir-edit" value="{{$customer_closings->tgl_lahir}}">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Foto KTP</label>
                            <input type="file" class="form-control" name="foto_ktp" id="foto_ktp">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                            </br>
                            <div id="Foto_KTP">
                                <img src="{{ asset('img/foto_ktp/'.$customer_closings->fto_ktp) }}" width="300" id="insertedImages">
                            </div>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                            <input type="hidden" name="foto_ktp_lama" id="foto_ktp_lama" value="{{$customer_closings->fto_ktp}}">
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Foto Rumah</label>
                            <input type="file" class="form-control" name="foto_rumah" id="foto_rumah">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                            </br>
                            <div id="Foto_Rumah">
                                <img src="{{ asset('img/foto_rumah/'.$customer_closings->fto_rumah) }}" width="300" id="insertedImages">
                            </div>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                            <input type="hidden" name="foto_rumah_lama" id="foto_rumah_lama" value="{{$customer_closings->fto_rumah}}">
                        </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        
                        <button type="submit" class="btn btn-primary" id="update">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<script>
    $(document).ready(function () {
            $('#province_id-edit').on('change', function () {
                var idCountry = this.value;
                
                $("#regencies_id-edit").html('');
                $.ajax({
                    url : "{{url('api/fetch-regencies')}}",
                    type: "POST",
                    data: {
                        province_id : idCountry,
                        _token      : '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#regencies_id-edit').html('<option value="">Select Regencies</option>');
                        $.each(result.regencie, function (key, value) {
                            $("#regencies_id-edit").append('<option value="' + value.id + '">' + value.nama + '</option>');
                        });
                        $('#district_id-edit').html('<option value="">Select District</option>');
                    }
                });
            });
            $('#regencies_id-edit').on('change', function () {
                var idCountry = this.value;
                $("#district_id-edit").html('');
                $.ajax({
                    url: "{{url('api/fetch-district')}}",
                    type: "POST",
                    data: {
                        regencie_id : idCountry,
                        _token      : '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#district_id-edit').html('<option value="">Select District</option>');
                        $.each(result.district, function (key, value) {
                            $("#district_id-edit").append('<option value="' + value.id + '">' + value.nama + '</option>');
                        });
                        $('#village_id-edit').html('<option value="">Select Village</option>');
                    }
                });
            });
            $('#district_id-edit').on('change', function () {
                var idCountry = this.value;
                $("#village_id-edit").html('');
                $.ajax({
                    url: "{{url('api/fetch-village')}}",
                    type: "POST",
                    data: {
                        district_id : idCountry,
                        _token      : '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#village_id-edit').html('<option value="">Select Village</option>');
                        $.each(result.village, function (key, value) {
                            $("#village_id-edit").append('<option value="' + value.id + '">' + value.nama + '</option>');
                        });
                        
                    }
                });
            });
        });


    </script>

@endsection