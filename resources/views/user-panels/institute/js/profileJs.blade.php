<script>
    function addDoc(name){
        $('#doc_type').text(name)
        $('#type').val(name)
        $("#save_doc_modal").modal("show");
    }
    function updatePrograms(){
        let prg_arr = [];
        $("input:checkbox[name=programs]:checked").each(function(){
            prg_arr.push($(this).val());
        });
        if(prg_arr.length == 0 ){
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Select atleast one program!',
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
        }
        prg_arr = prg_arr.join(',')

        var formData = {
            programs: prg_arr
        }

        $.ajax({
            type: 'POST',
            url: "{{route('update_programs')}}",
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
                    $("#save_doc_type_modal").modal("hide");
                    $('#doc_name').val('')
                }else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Somethingwent Wrong',
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });
                    $("#save_doc_type_modal").modal("hide");
                    $('#doc_name').val('')
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
        // console.log(prg_arr)
    }

</script>
