@extends('backend.layouts.master')
@section('title', 'Roles Page')
@section('styles')
    <style type="text/stylesheet">
        

    </style>
@stop
@section('main-content')
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                    <li><span>Role List</span></li>
                </ul>
            </div>
        </div>
        @include('backend.partials.logout')
    </div>
</div>
    <div class="main-content-inner">
        <div class="row">
            <!-- Dark table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right mb-2">
                            <a href={{ route('admin.roles.create') }} class="btn btn-dark btn-sm"><i
                                    class="fa fa-plus-circle"></i> &nbsp;Add {{ $title }}</a>
                        </div>

                        <h4 class="header-title">{{ $title }}</h4>

                        <div class="data-tables datatable-dark">
                            <table id="dataTable3" class="text-center">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Guard</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)


                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->guard_name }}</td>
                                            <td>
                                                <a href=""><i class="fa fa-trash fa-2x text-danger"></i></a> &nbsp;
                                                <a href="{{ route('admin.roles.edit', $role->id) }}">
                                                    <i class="fa fa-edit fa-2x text-warning"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dark table end -->
        </div>
    </div>
@endsection
