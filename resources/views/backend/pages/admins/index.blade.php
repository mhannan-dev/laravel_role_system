@extends('backend.layouts.master')
@section('title')
Admins - Admin Panel
@endsection
@section('styles')
<!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection
@section('admin-content')
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Admins</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>All Admins</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <!-- data table end -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Admins List</h4>
                    <p class="float-right mb-2">

                            <a class="btn btn-primary text-white" href="{{ route('admin.admins.create') }}">Create New Admin</a>

                    </p>
                    <div class="data-tables">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            @include('backend.layouts.partials.messages')
                            <div class="row">
                                <div class="col-sm-12">

                                    <table id="dataTable" class="text-center dataTable no-footer dtr-inline" role="grid"
                                        aria-describedby="dataTable_info" style="100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr role="row">
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($admins as $admin)
                                            <tr role="row" class="odd">
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>
                                                    @foreach ($admin->roles as $role)
                                                    <span class="badge badge-info mr-1">
                                                        {{ $role->name }}
                                                    </span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <ul class="d-flex justify-content-center d-inline-block">
                                                        <li>
                                                            <a class="text-secondary"
                                                            href="{{ route('admin.admins.edit', $admin->id) }}"><i class="fa fa-edit fa-2x"></i></a>
                                                        </li>
                                                        <li><a class="text-danger"
                                                            href="{{ route('admin.admins.destroy', $admin->id) }}"
                                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">
                                                            <i class="ti-trash fa-2x"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $admin->id }}"
                                                            action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST"
                                                            style="display: none;">
                                                            @method('DELETE')
                                                            @csrf
                                                        </form></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script>
    /*======== datatable active =========*/
    if ($('#dataTable').length) {
        $('#dataTable').DataTable({
            responsive: true
        });
    }
</script>
@endsection
