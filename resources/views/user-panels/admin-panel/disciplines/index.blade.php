@extends('layouts.master')
@section('title')
@lang('translation.basic-tables')
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
About
@endslot
@slot('title')
Disciplines
@endslot
@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">@lang('Disciplines')</h4>
                <div class="flex-shrink-0">
                    <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#save_discipline_modal">
                        <i class="ri-file-list-3-line align-middle"></i> Add Discipline
                    </button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="filters my-4">
                    <form action="">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Institutes</label>
                                    <select name="institute" id="" class="form form-select select2">
                                        <option value="">Select Institute</option>
                                        @forelse($institutes as $institute)

                                        <option value="{{$institute->name}}" <?= isset($_GET['institute']) && !empty($_GET['institute'])  && $_GET['institute'] == $institute->name ? 'selected' : '' ?>>{{$institute->name}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Institutes Types</label>
                                    <select name="institute_type" id="" class="form form-select select2">
                                        <option value="">Select Type</option>

                                        @forelse($institute_types as $type)

                                        <option value="{{$type->type}}" <?= isset($_GET['institute_type']) && !empty($_GET['institute_type'])  && $_GET['institute_type'] == $type->type ? 'selected' : '' ?>>{{$type->type}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br>
                                <input type="submit" class="btn btn-primary mt-1" value="Submit" name="submit">
                                <a href="{{ route('discipline') }}" class="btn btn-danger mt-1">Reset</a>
                            </div>

                        </div>
                    </form>
                </div>


                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>SR No.</th>
                            <th>Title</th>
                            <th>Institute</th>
                            <th>Category</th>
                            <th>Programs</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                        @foreach($disciplines as $discipline)
                        <tr>
                            <td class="fw-medium">{{$count}}</td>
                            <td>{{$discipline->discipline_name}}</td>
                            <td>{{$discipline->institute}}</td>
                            <td>{{$discipline->institute_type}}</td>
                            <td>
                                @if($discipline->programs)
                                @foreach($discipline->programs as $program)
                                <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary program-title" data-program-id={{$program->id}} data-program-title={{$program->title}}>{{$program->title}}</a>
                                @endforeach
                                @else
                                ---
                                @endif
                            </td>
                            <td>
                                <a style="cursor:pointer" onclick="editDiscipline(`{{$discipline->id}}`,`{{$discipline->discipline_name}}`,`{{$discipline->amount}}`)" class="link-success fs-15" tooltip="Edit Discipline"><i class="ri-edit-2-line"></i></a>
                                <a style="cursor:pointer" onclick="addProgram(`{{$discipline->id}}`,`{{$discipline->discipline_name}}`)" class="link-success fs-15" tooltip="Add Program"><i class="ri-layout-2-fill"></i></a>

                                {{-- <a href="javascript:void(0);" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a> --}}
                            </td>
                        </tr>
                        @php
                        $count++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade zoomIn" id="save_discipline_modal" tabindex="-1" aria-labelledby="save_discipline_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="save_discipline_modal"> Add New Discipline</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_discipline_form" autocomplete="off" action="{{ route('save_discipline') }}">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="orderId" class="form-label">Title</label>
                                <input type="text" id="discipline_name" class="form-control" placeholder="Title" required />
                            </div>
                        </div>
                        <!-- <div class="col-lg-12">
                            <div>
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" id="amount" class="form-control" placeholder="Amount" required/>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <div class="row col-md-12 justify-content-center">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Type of Institute:</label>

                                    @forelse ($institute_types as $type)

                                    <div class="form-check">
                                        <input class="form-check-input" id="institute_type" name="institute_type" value="{{strtolower($type->type) }}" type="radio">
                                        <label class="form-check-label">{{$type->type}}</label>
                                    </div>

                                    @empty

                                    @endforelse
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Institutes:</label>
                                    @forelse ($institutes as $institute)

                                    <div class="form-check">
                                        <input class="form-check-input" id="institute" name="institute" value="{{ strtolower($institute->name) }}" type="radio" checked>
                                        <label class="form-check-label">{{$institute->name}}</label>
                                    </div>

                                    @empty

                                    @endforelse
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Add</button>
                        {{-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade zoomIn" id="edit_discipline_modal" tabindex="-1" aria-labelledby="edit_discipline_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="edit_discipline_modal"> Edit Discipline</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="edit_discipline_form" autocomplete="off" action="{{ route('update_discipline') }}">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="edit_discipline_name" class="form-label">Title</label>
                                <input type="text" id="edit_discipline_name" class="form-control" placeholder="Title" required />
                            </div>
                            <input id="edit_discipline" hidden value="">
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="edit_amount" class="form-label">Amount</label>
                                <input type="number" id="edit_amount" class="form-control" placeholder="Amount" required />
                            </div>
                            <input id="edit_discipline" hidden value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Add</button>
                        {{-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade zoomIn" id="show_program_modal" tabindex="-1" aria-labelledby="show_program_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="show_program_modal"> Edit Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>

            <form action="" id="edit-program">

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="show_program_title" class="form-label">Title</label>
                                <input type="text" id="show_program_title" class="form-control" name="program_title" placeholder="Title" required />
                            </div>
                            <input id="show_program_id" hidden value="" name="program_id">
                        </div>

                        <div class="row">
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-primary add-policy">Add Policy</button>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <table class="table border">
                                    <thead>
                                        <th>Policy Category</th>
                                        <th>Policy Name</th>
                                        <th>Operator</th>
                                        <th>Value</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody id="policy-table">
                                        <tr data-row-id="1">
                                             <td>

                                                <select name="policy_category[1]" id="" class="form form-control">
                                                    <option value="">Select Category</option>
                                                    @forelse($policy_categories as $key => $category) 
                                                      <option value="{{$category->id}}">{{$category->category}}</option>
                                                    @empty

                                                    @endforelse
                                                </select>
                                            
                                            </td>
                                            <td><input type="text" class="form form-control" name="policy_names[1]"></td>
                                            <td><input type="text" class="form form-control" name="operators[1]"></td>
                                            <td><input type="text" class="form form-control" name="values[1]"></td>
                                            <td><button class="btn btn-sm btn-danger delete-policy"><i class="fa fa-trash"></i></button></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="update-btn">Update</button>
                        <button type="button" class="btn btn-danger" id="delete-btn">Delete</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Save program modals -->
<div class="modal fade zoomIn" id="save_program_modal" tabindex="-1" aria-labelledby="save_discipline_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="save_discipline_modal"> Add New Program for <span id="dis_name"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" id="save_program_form" autocomplete="off" action="{{ route('save_program') }}">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="orderId" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Title" required />
                            </div>
                            <input id="p_dis_id" hidden name="discipline_id" value="">
                        </div>
                    </div>

                    <div class="row">
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-primary add-new-policy">Add Policy</button>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <table class="table border">
                                    <thead>
                                        <th>Policy Category</th>
                                        <th>Policy Name</th>
                                        <th>Operator</th>
                                        <th>Value</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody id="policy-new-table">
                                        <tr data-row-id="1">
                                             <td>

                                                <select name="policy_category[1]" id="" class="form form-control">
                                                    <option value="">Select Category</option>
                                                    @forelse($policy_categories as $key => $category) 
                                                      <option value="{{$category->id}}">{{$category->category}}</option>
                                                    @empty

                                                    @endforelse
                                                </select>
                                            
                                            </td>
                                            <td><input type="text" class="form form-control" placeholder="Add Title" name="policy_names[1]"></td>
                                            <td><input type="text" class="form form-control" placeholder="e.g >, <, =, >=, <=" name="operators[1]"></td>
                                            <td><input type="text" class="form form-control" placeholder="Number" name="values[1]"></td>
                                            <td><button class="btn btn-sm btn-danger delete-new-policy"><i class="fa fa-trash"></i></button></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Add</button>
                        {{-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end row-->
@endsection

@section('script')
@include('user-panels/admin-panel/disciplines/js/indexJs')

<script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script>
    $(document).ready(function() {

        $(".program-title").on("click", function() {
            var program_id = $(this).data('program-id');
            var program_title = $(this).data('program-title');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $("#show_program_title").val(program_title);
            $("#show_program_id").val(program_id);


            $.ajax({
                type: 'POST',
                url: '{{ route('edit_program_title') }}',
                data: {
                    program_id : program_id
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(data) {
                    data = JSON.parse(data);

                    if(data.status == 'success'){
                        console.log(data.html);
                        $("#policy-table").html(data.html);
                    }
                   
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });

            $("#show_program_modal").modal('show');
        });

        $("#update-btn").on("click", function() {
            var program_id = $('#show_program_id').val();
            var program_title = $("#show_program_title").val();

            formData = $("#edit-program").serialize();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            console.log(formData);


            $.ajax({
                type: 'POST',
                url: '{{ route('update-program-title') }}',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(data) {

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.Message,
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });

                    // $("#show_program_modal").modal('hide');
                    // window.location.href = 'disciplines';
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });

        })


        $("#delete-btn").on("click", function() {
            var program_id = $('#show_program_id').val();


            $.ajax({
                type: 'GET',
                url: '{{ route('delete-program-title') }}',
                data: {
                    program_id: program_id,
                },
                success: function(data) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.Message,
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });

                    // $("#show_program_modal").modal('hide');
                    window.location.href = 'disciplines';
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });

        })

        $('.add-policy').on("click", function() {
            var last_row = $("#policy-table tr:last");
            var last_row_id = last_row.data('row-id');
            last_row_id += 1;

            var category = '<td><select name="policy_category['+last_row_id+']" id="" class="form form-control select2"> ';
            category += '<option value="">Select Category</option>';

            <?php foreach($policy_categories as $category): ?>
                category += '<option value="<?= $category->id ?>"><?= $category->category ?></option>';
            <?php endforeach; ?>

            category += '</select></td>';

            var html = ' <tr data-row-id="' + last_row_id + '">' + category +
                '<td><input type="text" class="form form-control" placeholder="Add Title" name="policy_names[' + last_row_id + ']"></td>' +
                '<td><input type="text" class="form form-control" placeholder="e.g >, <, =, >=, <=" name="operators[' + last_row_id + ']"></td>' +
                '<td><input type="text" class="form form-control" placeholder="Number" name="values[' + last_row_id + ']"></td>' +
                '<td><button class="btn btn-sm btn-danger delete-policy"><i class="fa fa-trash"></i></button></td>' +
                '</tr>';

            $("#policy-table").append(html);
            return false;
        });


        $(document).on("click", ".delete-policy", function() {

            var policy_id = $(this).data('policy-id');

            if(policy_id != undefined){

                $.ajax({
                    type: 'GET',
                    url: '{{ route('delete_program_policy') }}',
                    data: {
                        id: policy_id,
                    },
                    success: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000,
                            showCloseButton: true
                        });

                        // $("#show_program_modal").modal('hide');
                       // window.location.href = 'd';
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });


            }


            $(this).parent().parent().remove();
        })

        $('.add-new-policy').on("click", function() {
            var last_row = $("#policy-table tr:last");
            var last_row_id = last_row.data('row-id');
            last_row_id += 1;

            var category = '<td><select name="policy_category['+last_row_id+']" id="" class="form form-control select2"> ';
            category += '<option value="">Select Category</option>';

            <?php foreach($policy_categories as $category): ?>
                category += '<option value="<?= $category->id ?>"><?= $category->category ?></option>';
            <?php endforeach; ?>

            category += '</select></td>';

            var html = ' <tr data-row-id="' + last_row_id + '">' + category +
                '<td><input type="text" class="form form-control" placeholder="Add Title" name="policy_names[' + last_row_id + ']"></td>' +
                '<td><input type="text" class="form form-control" placeholder="e.g >, <, =, >=, <=" name="operators[' + last_row_id + ']"></td>' +
                '<td><input type="text" class="form form-control" placeholder="Number" name="values[' + last_row_id + ']"></td>' +
                '<td><button class="btn btn-sm btn-danger delete-policy"><i class="fa fa-trash"></i></button></td>' +
                '</tr>';

            $("#policy-new-table").append(html);
            return false;
        });


        $(document).on("click", ".delete-new-policy", function() {

            $(this).parent().parent().remove();
        })


    });
</script>
@endsection