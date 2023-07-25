<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{'customer_closing'}}" method="POST" enctype="multipart/form-data"> 
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="control-label">Nama Customer Prospect</label>
                    <select class="select2 form-control" name="prospect_id" id="prospect_id">
                        <option disabled selected>--pilih Customer--</option>
                         @foreach ($prospects as $prospect)
                             <option value="{{ $prospect->id }}">{{ $prospect->nama }}</option>
                         @endforeach
                       </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Nama Paket</label>
                        <select class="select2 form-control" name="prospect_id" id="prospect_id">
                            <option disabled selected>--pilih Paket--</option>
                             @foreach ($pakets as $paket)
                                 <option value="{{ $paket->id }}">{{ $paket->nama_layanan }}</option>
                             @endforeach
                           </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                    </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Nama Promo</label>
                            <select class="select2 form-control" name="prospect_id" id="prospect_id">
                                <option disabled selected>--pilih Promo--</option>
                                 @foreach ($programs as $program)
                                     <option value="{{ $program->id }}">{{ $paket->nama_program }}</option>
                                 @endforeach
                               </select>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">NIK </label>
                            <input type="text" class="form-control" name="nik" id="nik">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Nama </label>
                            <input type="text" class="form-control" name="nama" id="nama">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">JK </label>
                            <input type="text" class="form-control" name="jk" id="jk">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Provinci</label>
                            <select class="select2 form-control" name="province_id" id="province_id">
                                <option disabled selected>--pilih Provinsi--</option>
                                 @foreach ($provinces as $province)
                                     <option value="{{ $province->id }}">{{ $province->nama }}</option>
                                 @endforeach
                               </select>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Kota</label>
                            <select class="select2 form-control" name="regencies_id" id="regencies_id">
                                 
                               </select>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Kecamatan</label>
                            <select class="select2 form-control" name="district_id" id="district_id">
                                 
                               </select>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Dusun</label>
                            <select class="select2 form-control" name="village_id" id="village_id">
                                 
                               </select>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" id="tlg_lahir">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Foto KTP</label>
                            <input type="file" class="form-control" name="foto_ktp" id="foto_ktp">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Foto Rumah</label>
                            <input type="file" class="form-control" name="foto_rumah" id="foto_rumah">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                        </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="submit" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-create-customer-closing', function () {

        //open modal
        $('#modal-create').modal('show');
    });

</script>
<script>
$(document).ready(function () {
            $('#province_id').on('change', function () {
                var idCountry = this.value;
                $("#regencies_id").html('');
                $.ajax({
                    url: "{{url('api/fetch-regencies')}}",
                    type: "POST",
                    data: {
                        province_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#regencies_id').html('<option value="">Select Regencies</option>');
                        $.each(result.regencie, function (key, value) {
                            $("#regencies_id").append('<option value="' + value.id + '">' + value.nama + '</option>');
                        });
                        $('#district_id').html('<option value="">Select District</option>');
                    }
                });
            });
            $('#regencies_id').on('change', function () {
                var idCountry = this.value;
                $("#district_id").html('');
                $.ajax({
                    url: "{{url('api/fetch-district')}}",
                    type: "POST",
                    data: {
                        regencie_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#district_id').html('<option value="">Select District</option>');
                        $.each(result.district, function (key, value) {
                            $("#district_id").append('<option value="' + value.id + '">' + value.nama + '</option>');
                        });
                         $('#village_id').html('<option value="">Select Village</option>');
                    }
                });
            });
            $('#district_id').on('change', function () {
                var idCountry = this.value;
                $("#village_id").html('');
                $.ajax({
                    url: "{{url('api/fetch-village')}}",
                    type: "POST",
                    data: {
                        district_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#village_id').html('<option value="">Select Village</option>');
                        $.each(result.village, function (key, value) {
                            $("#village_id").append('<option value="' + value.id + '">' + value.nama + '</option>');
                        });
                        
                    }
                });
            });
        });
    </script>