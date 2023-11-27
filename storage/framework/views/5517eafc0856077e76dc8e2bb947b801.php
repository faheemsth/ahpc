<script>

    $("#save_doc_type_form").submit(function(event) {
        event.preventDefault();
        var action = $('#save_doc_type_form').attr("action");

        let title = $('#doc_name').val();
        let institute_type = $('input[name="institute_type"]:checked').val();
        let institute = $('input[name="institute"]:checked').val();

        var formData = {
            title: title,
            institute_type: institute_type,
            institute: institute,
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
    });




        $("#save_doc_type_form").submit(function(event) {
        event.preventDefault();
        var action = $('#save_doc_type_form').attr("action");

        let title = $('#doc_name').val();
        let institute_type = $('input[name="institute_type"]:checked').val();
        let institute = $('input[name="institute"]:checked').val();

        var formData = {
            title: title,
            institute_type: institute_type,
            institute: institute,
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
    });
</script>
<script>
    $(document).ready(function() {
        $("#save_fee_structure_form").submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('save_fee_structure')); ?>",
                data: formData,
                success: function(response) {
                    $("#overseas-fee-structure-modal").modal('hide');
                    location.reload(); // Use location.reload() to reload the page
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
        $("#save_fee_structure_form2").submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('save_fee_structure')); ?>",
                data: formData,
                success: function(response) {
                    $("#overseas-fee-structure-modal").modal('hide');
                    location.reload(); // Use location.reload() to reload the page
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    });
    function updateFeeStructure(id, cdd, fee) {
            $('#overseas-fee-structure-modal').modal('show');
            $('input[name="cdd"][value="' + cdd + '"]').prop('checked', true);
            $('#fee').val(fee);
            $('#save_fee_structure_form').find('input[name="edit"]').val(id);
        }
        function updateFeeStructure2(id, cdd, fee) {
            $('#overseas-fee-structure-modal2').modal('show');
            $('input[name="cdd"][value="' + cdd + '"]').prop('checked', true);
            $('#fee2').val(fee);
            $('#save_fee_structure_form2').find('input[name="edit"]').val(id);
        }
</script>


<?php /**PATH /home/admin/public_html/ahpc.smarttechnologyhouse.net/resources/views/user-panels/admin-panel/settings/js/indexJs.blade.php ENDPATH**/ ?>