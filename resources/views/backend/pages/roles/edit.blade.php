@extends('backend.layouts.master')
@section('title', 'Roles Page')
@section('styles')
    <style type="text/stylesheet">
        .form-check-label {
                    text-transform: capitalize;
                }

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
                    <li><span>Edit Role</span></li>
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
                        <h4 class="header-title">{{ $title }}</h4>
                        @include('backend.partials.messages')
                        <form action="{{ route('admin.roles.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Role Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $role->name }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Permissions</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                                    <label class="form-check-label text-capitalize" for="checkPermissionAll">All</label>
                                </div>
                                <hr>
                                @php $i = 1; @endphp
                                @foreach ($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                    id="{{ $i }}Management" value="{{ $group->name }}"
                                                    onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                                <label class="form-check-label text-capitalize"
                                                    for="checkPermission">{{ $group->name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-9 role-{{ $i }}-management-checkbox">
                                            @php
                                                $permissions = App\User::getpermissionsByGroupName($group->name);
                                                $roleHasPermission = App\User::rolehasPermission($group->name);
                                                $j = 1;
                                            @endphp
                                            @foreach ($permissions as $permission)
                                                <div class="form-check">
                                                    <input type="checkbox"  {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} class="form-check-input" name="permissions[]"
                                                        id="checkPermission{{ $permission->id }}"
                                                        value="{{ $permission->name }}">
                                                    <label class="form-check-label text-capitalize"
                                                        for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                </div>
                                                @php
                                                    $j++;
                                                @endphp
                                            @endforeach
                                            <br>
                                        </div>
                                    </div>
                                    @php  $i++; @endphp
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Role</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Dark table end -->
        </div>
    </div>

    @include('backend.pages.roles.partials.scripts')
@endsection
