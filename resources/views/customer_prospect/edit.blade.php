<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{'customer_prospect'}}"  method="POST" enctype="multipart/form-data"> 
                
                @csrf
                @method('put')
            <div class="modal-body">

                <input type="hidden" name="id" id="id">

                <div class="form-group">
                    <label for="name" class="control-label">Nama Customer</label>
                    <input type="text" class="form-control" name="name" id="name-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Nomor Telepon</label>
                    <input type="text" class="form-control" name="no_tlpn" id="no_tlpn-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Metode Bertemu</label>
                    <select class="select2 form-control" name="metode_bertemu" id="metode_bertemu-edit">
                        {{-- <option disabled selected>--pilih metode--</option> --}}
                         @foreach ($metode_bertemu as $metode_bertemus)
                             <option value="{{ $metode_bertemus->id }}">{{ $metode_bertemus->metode_bertemu }}</option>
                         @endforeach
                       </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Status</label>
                    <select class="select2 form-control" name="status" id="status-edit">
                        {{-- <option disabled selected>--pilih status--</option> --}}
                         @foreach ($status as $statuss)
                             <option value="{{ $statuss->id }}">{{ $statuss->status }}</option>
                         @endforeach
                       </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
            </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="submit" class="btn btn-primary" id="update">UPDATE</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-edit-customer-prospect', function () {

        let id = $(this).data('id');
        
        //fetch detail post with ajax
        
        console.log(id);
        $.ajax({
            url: `/customer_prospect/${id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                $('#id').val(response.data.id);
                console.log(response.data.id);
                $('#name-edit').val(response.data.nama);
                $('#alamat-edit').val(response.data.alamat);
                $('#no_tlpn-edit').val(response.data.no_tlpn);
                $('#metode_bertemu-edit').val(response.data.metode_bertemu_id);
                $('#status-edit').val(response.data.status_id);
                //open modasl
            
                $('#modal-edit').modal('show');
            }
        });
    
    });

    

</script>

