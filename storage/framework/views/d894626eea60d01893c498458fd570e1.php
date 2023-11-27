<script>
    function updateDoc(id,name){
        $('#update_doc_modal_title').text(name);
        $('#type').val(id);

        $('#update_doc_modal').modal('show');   
    }

    
    $("#update_doc_form").submit(function(event) {
        event.preventDefault();
        var action = $('#update_doc_form').attr("action");

        let status = $('#doc_status').val();
        let description = $('#doc_desc').val();
        let type = $('#type').val();
        let inst = $('#inst').val();
        
        var formData = {
            status: status,
            description: description,
            type: type,
            inst:inst
        }
        $.ajax({
            type: 'POST',
            url: action,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            dataType: 'json',
            beforeSend: function(data) {
            },
            success: function(data) {
                if (data.isSuccess == true && data.status_code == 200) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.Message,
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });
                    window.location.reload();
                } else if(data.isSuccess == true && data.status_code == 201){
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: data.Message,
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });
                    $("#update_doc_modal").modal("hide");
                    // $('#title').val('')
                }else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Somethingwent Wrong',
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });
                    $("#update_doc_modal").modal("hide");
                    // $('#des').val('')
                }
            },
            complete: function(data) {
                // alert(data.message);
            },
            error: function(error) {
                let emailerr = error.responseJSON.errors != null ? error.responseJSON.errors.email[0] : '-';
                alet(emailerr);
            }
        });
    });
    
    function updateProgramStatus(id,name,dis_name){

        $('#update_prg_modal_title').text(dis_name+'-'+name);
        $('#prg_id').val(id);
        $('#update_prg_modal').modal('show');

    }

    $("#update_prg_form").submit(function(event) {
        event.preventDefault();
        var action = $('#update_prg_form').attr("action");

        let status = $('#prg_status').val();
        let description = $('#prg_desc').val();
        let prg_id = $('#prg_id').val();
        let inst = $('#inst').val();
        
        var formData = {
            status: status,
            description: description,
            prg_id: prg_id,
            inst:inst
        }
        $.ajax({
            type: 'POST',
            url: action,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            dataType: 'json',
            beforeSend: function(data) {
            },
            success: function(data) {
                if (data.isSuccess == true && data.status_code == 200) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.Message,
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });
                    window.location.reload();
                } else if(data.isSuccess == true && data.status_code == 201){
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: data.Message,
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });
                    $("#update_prg_modal").modal("hide");
                    // $('#title').val('')
                }else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Somethingwent Wrong',
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });
                    $("#update_prg_modal").modal("hide");
                    // $('#des').val('')
                }
            },
            complete: function(data) {
                // alert(data.message);
            },
            error: function(error) {
                let emailerr = error.responseJSON.errors != null ? error.responseJSON.errors.email[0] : '-';
                alet(emailerr);
            }
        });
    });
</script>
<?php /**PATH C:\wamp64\www\Projects\ahpc\resources\views/user-panels/admin-panel/overseas/js/indexJs.blade.php ENDPATH**/ ?>