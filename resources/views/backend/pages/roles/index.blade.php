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

                        <div class="data-tables">
                            <table id="dataTable3" class="text-center">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th width="10%">Name</th>
                                        <th width="60%">Permissions</th>
                                        
                                        <th width="20%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)


                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                @foreach ($role->permissions  as $item)
                                                <span class="badge badge-success">
                                                    {{ $item->name }}
                                                </span>
                                                    
                                                @endforeach
                                            </td>
                                            <td>{{ $role->guard_name }}</td>
                                            <td>
                                                
                                                <a href="{{ route('admin.roles.edit', $role->id) }}">
                                                    <i class="fa fa-edit fa-2x text-warning"></i>
                                                </a>
                                                <a href="{{ route('admin.roles.destroy', $role->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                                    <i class="fa fa-trash fa-2x text-danger"></i>
                                                    </a>
        
                                                    <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
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
