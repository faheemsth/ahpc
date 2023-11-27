
<script>

$("#save_discipline_form").submit(function(event) {
    event.preventDefault();
    var action = $('#save_discipline_form').attr("action");

    let title = $('#discipline_name').val();
    let amount = $('#amount').val();
    let type = $('#institute_type:checked').val();
    let institute = $("#institute").val();
    
    var formData = {
        discipline_name: title,
        amount: amount,
        type: type,
        institute: institute
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
                $("#save_discipline_modal").modal("hide");
                $('#discipline_name').val('')
            }else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Somethingwent Wrong',
                    showConfirmButton: false,
                    timer: 2000,
                    showCloseButton: true
                });
                $("#save_discipline_modal").modal("hide");
                $('#discipline_name').val('')
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

$("#edit_discipline_form").submit(function(event) {
    event.preventDefault();
    var action = $('#edit_discipline_form').attr("action");

    let title = $('#edit_discipline_name').val();
    let amount = $('#edit_amount').val();
    let d_id = $('#edit_discipline').val();
    
    var formData = {
        discipline_name: title,
        id: d_id,
        amount: amount,
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
                $("#edit_discipline_modal").modal("hide");
                $('#edit_discipline_name').val('')
            }else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Somethingwent Wrong',
                    showConfirmButton: false,
                    timer: 2000,
                    showCloseButton: true
                });
                $("#edit_discipline_modal").modal("hide");
                $('#edit_discipline_name').val('')
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

function editDiscipline(id,name,amount){

    let d_id = id;
    $('#edit_discipline_name').val(name)
    $('#edit_amount').val(amount)
    $('#edit_discipline').val(d_id)
    $("#edit_discipline_modal").modal("show");

}

function addProgram(id,name){
    
    let d_id = id;
    $('#dis_name').text(name)
    // $('#edit_amount').val(amount)
    $('#p_dis_id').val(d_id)
    $("#save_program_modal").modal("show");

}


$("#save_program_form").submit(function(event) {
    event.preventDefault();
    var action = $('#save_program_form').attr("action");

    let title = $('#title').val();
    let p_dis_id = $('#p_dis_id').val();
    
    // var formData = {
    //     title: title,
    //     discipline_id: p_dis_id
    // }

    var formData = $("#save_program_form").serialize();
    
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
                $("#save_program_modal").modal("hide");
                $('#title').val('')
            }else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Somethingwent Wrong',
                    showConfirmButton: false,
                    timer: 2000,
                    showCloseButton: true
                });
                $("#save_program_modal").modal("hide");
                $('#title').val('')
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


</script><?php /**PATH C:\wamp64\www\Projects\ahpc\resources\views/user-panels/admin-panel/disciplines/js/indexJs.blade.php ENDPATH**/ ?>