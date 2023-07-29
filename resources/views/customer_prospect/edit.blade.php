<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT Customer Prospect</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
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
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="update">UPDATE</button>
                </div>
            </div>
           
        </div>
    </div>


<script>
    //button create post event
    $('body').on('click', '#btn-edit-customer-prospect', function () {

        let id = $(this).data('id');
        
        //fetch detail post with ajax
        
        
        $.ajax({
            url: `/customer_prospect/${id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                $('#id').val(response.data.id);
                
                $('#name-edit').val(response.data.nama);
                $('#alamat-edit').val(response.data.alamat);
                $('#no_tlpn-edit').val(response.data.no_tlpn);
                $('#metode_bertemu-edit').val(response.data.metode_bertemu_id);
                $('#status-edit').val(response.data.status_id);
                //open modal
               
                $('#modal-edit').modal('show');
            }
        });
       
    });

    //action update post
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let id = $('#id').val();
        
        let name                = $('#name-edit').val();
        let alamat              = $('#alamat-edit').val();
        let no_tlpn             = $('#no_tlpn-edit').val();
        let metode_bertemu      = $('#metode_bertemu-edit').val();
        let status              = $('#status-edit').val();
       
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/customer_prospect/${id}`,
            type: "PUT",
            cache: false,
            data: {
                "name"              : name,
                "no_tlpn"           : no_tlpn,
                "alamat"            : alamat,
                "metode_bertemu"    : metode_bertemu,
                "status"            : status,
                "_token": token
            },
            success:function(response){

                //show success message
                Swal.fire({
                   
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 2000
                });

                //data post
                // let kategoris = `
                //     <tr id="index_${response.data.id_kategori}">
                //         <td>${response.data.name}</td>
                //         <td class="text-center">
                //             <a href="javascript:void(0)" id="btn-edit-kategori" data-id="${response.data.id_kategori}" class="btn btn-primary btn-sm">EDIT</a>
                //             <a href="javascript:void(0)" id="btn-delete-kategori" data-id="${response.data.id_kategori}" class="btn btn-danger btn-sm">DELETE</a>
                //         </td>
                //     </tr>
                // `;
                
                // //append to post data
                // $(`#index_${response.data.id}`).replaceWith(kategoris);

                //close modal
                $('#modal-edit').modal('hide');
                setTimeout(function(){
                    location.reload();
                }, 1000);
                

            },
            error:function(error){
                
                if(error.responseJSON.title[0]) {

                    //show alert
                    $('#alert-name-edit').removeClass('d-none');
                    $('#alert-name-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-name-edit').html(error.responseJSON.title[0]);
                } 

               

            }

        });

    });

   
    

</script>

