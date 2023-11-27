<script>
    let rl_id = <?php echo json_encode(\Auth::user()->role_id); ?>


    function viewInvoices(id,name){

        $('#invoices_modal_title').text(name+' Invoices');
        $('#inst_id').val(id);
        $('#invst_name').val(name);

        $.ajax({
        type: 'GET',
        url: "<?php echo e(url('get_invoices')); ?>/"+id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if (data.isSuccess == true) {
                let invoices = data.data;
                let tbl = '';
                for(let i = 0 ; i < invoices.length ; i++){
                    let status = 'Pending';
                    let inv_status = '';
                    let status_name = '';

                    if(invoices[i].invoice_status == 0){
                        inv_status = 'badge bg-danger-subtle text-danger';
                        inv_status_name = 'Unpaid';
                    }else{
                        inv_status = 'badge bg-success-subtle text-success';
                        inv_status_name = 'Paid';
                    }

                    if(invoices[i].status == 0){
                        status = 'badge bg-warning-subtle text-warning';
                        status_name = 'Pending';
                    }else if(invoices[i].status == 1){
                        status = 'badge bg-success-subtle text-success';
                        status_name = 'Approved';
                    }else{
                        status = 'badge bg-danger-subtle text-danger';
                        status_name = 'Rejected';
                    }
                    <?php if(Request::segment(1) === 'institute'): ?>
                        btns = `
                            <a style="cursor:pointer" title="Download" href="/invoice/${invoices[i].id}"><i class="ri-download-2-line fs-17 lh-1 align-middle"></i></a>
                            <a style="cursor:pointer" title="Approve" onClick="updateInvoiceStatus(${invoices[i].id}, 1)"><i class="ri-check-double-line fs-17 lh-1 align-middle"></i></a>
                            <a style="cursor:pointer" title="Reject" onClick="updateInvoiceStatus(${invoices[i].id}, 2)"><i class="ri-close-circle-line fs-17 lh-1 align-middle"></i></a>
                        `;
                    <?php else: ?>
                        btns = `
                            <a style="cursor:pointer" title="Download" href="/overseas/invoice/${invoices[i].id}"><i class="ri-download-2-line fs-17 lh-1 align-middle"></i></a>
                            <a style="cursor:pointer" title="Approve" onClick="updateInvoiceStatus(${invoices[i].id}, 1)"><i class="ri-check-double-line fs-17 lh-1 align-middle"></i></a>
                            <a style="cursor:pointer" title="Reject" onClick="updateInvoiceStatus(${invoices[i].id}, 2)"><i class="ri-close-circle-line fs-17 lh-1 align-middle"></i></a>
                        `;
                    <?php endif; ?>

                    if(rl_id == 2){
                        btns = `<a style="cursor:pointer" title="Download" href="/invoice/`+invoices[i].id+`"><i class="ri-download-2-line fs-17 lh-1 align-middle"></i></a>`
                    }

                    tbl += `<tr>
                                <td>
                                    `+invoices[i].invoice_id+`
                                </td>
                                <td>
                                    `+invoices[i].description+`
                                </td>
                                <td>
                                    `+invoices[i].total_amount+` (Rs)
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="`+status+`">`+status_name+`</a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="`+inv_status+`">`+inv_status_name+`</a>
                                </td>
                                <td>
                                    `+btns+`
                                </td>


                            </tr>`
                }
                $("#invoice_body").html("");
                $("#invoice_body").html(tbl);
                $("#invoices_modal").modal("show");

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

    }

    function updateInvoiceStatus(id,status){


        $('#invoice_id').val(id);
        $('#visit_status').val(status);
        if(status == 2){
            $('#inv_sts_div').css("display", "block");
            $('#invoice_status').val(0);
        }else{
            $('#invoice_status').val(1);
        }
        $('#invoices_modal').modal('hide');
        $('#update_inv_modal').modal('show');

    }

    function submitInvoice(){

        let id = $('#invoice_id').val();
        let status = $('#visit_status').val();
        let invoice_status = $('#invoice_status').val();

        let description = $('#invoice_desc').val();

        let inst_id = $('#inst_id').val();
        let inst_name = $('#invst_name').val();

        var formData = {
            id: id,
            status:status,
            invoice_status:invoice_status,
            description:description
        }

        $.ajax({
            type: 'POST',
            url: "<?php echo e(route('update_invoice_status')); ?>",
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
                    $('#update_inv_modal').modal('hide');
                    // viewInvoices(inst_id,inst_name);
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
                    // $("#save_doc_type_modal").modal("hide");
                    // $('#doc_name').val('')
                }else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Somethingwent Wrong',
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });
                    // $("#save_doc_type_modal").modal("hide");
                    // $('#doc_name').val('')
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

    }

    function setupVisit(id,name,type){

        $('#inst_visit_title').text(name)
        $('#inst_id').val(id);
        $('#visit_type').val(type);

        $("#inst_visit_modal").modal("show");

    }

    function saveVisit(){

        let inst_id = $('#inst_id').val();
        let visit_type = $('#visit_type').val();
        let visit_amount = $('#visit_amount').val();

        var formData = {
            inst_id: inst_id,
            visit_type:visit_type,
            visit_amount:visit_amount
        }

        $.ajax({
            type: 'POST',
            url: "<?php echo e(route('add_institute_visit')); ?>",
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
                    $('#update_inv_modal').modal('hide');
                    // viewInvoices(inst_id,inst_name);
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
                    // $("#save_doc_type_modal").modal("hide");
                    // $('#doc_name').val('')
                }else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Somethingwent Wrong',
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });
                    // $("#save_doc_type_modal").modal("hide");
                    // $('#doc_name').val('')
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

    }

</script>
<?php /**PATH C:\wamp64\www\Projects\ahpc\resources\views/user-panels/dashboard/js/indexJs.blade.php ENDPATH**/ ?>