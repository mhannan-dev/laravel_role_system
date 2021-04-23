@extends('backend.layouts.master')
@section('title', 'Users Page')
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
                    <li><a href="{{ route('admin.users.index') }}">All Users</a></li>
                    <li><span>User List</span></li>
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
                            <a href={{ route('admin.users.create') }} class="btn btn-dark btn-sm"><i
                                    class="fa fa-plus-circle"></i> &nbsp;Add {{ $title }}</a>
                        </div>
                        <h4 class="header-title">{{ $title }}</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Email</th>
                                    <th width="40%">Roles</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        users
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}">
                                            <i class="fa fa-edit fa-2x text-warning"></i>
                                        </a>
                                        <a href="{{ route('admin.users.destroy', $user->id) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                                            <i class="fa fa-trash fa-2x text-danger"></i>
                                            </a>
                                            <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
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
            <!-- Dark table end -->
        </div>
    </div>
@endsection
