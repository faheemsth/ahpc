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
Users
@endslot
@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Users</h4>
                <!-- <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <button type="button" class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#save_discipline_modal">
                            <i class="ri-file-list-3-line align-middle"></i> Add Discipline
                        </button>
                    </div>
                </div> -->
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>SR No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>CNIC</th>
                            <th>Phone</th>
                            <th>Institute</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                        @foreach($users as $user)
                        <tr>
                            <td class="fw-medium">{{$count}}</td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->cnic_no}}</td>
                            <td>{{$user->contact}}</td>
                            <td>{{$user->institute}}</td>
                          
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
@endsection

@section('script')
@include('user-panels/admin-panel/disciplines/js/indexJs')

<script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection