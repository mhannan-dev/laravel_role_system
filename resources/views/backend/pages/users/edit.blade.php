@extends('backend.layouts.master')
@section('title', 'Roles Page')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@stop
@section('main-content')
    <div class="main-content-inner">
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
                        <li><span>Update User - {{ $user->name }}</span></li>
                    </ul>
                </div>
            </div>
            @include('backend.partials.logout')
        </div>
    </div>
        <div class="row">
            <!-- Dark table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ $title }}-{{ $user->name }}</h4>
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $user->name }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="email">User Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ $user->email }}">
                                </div>
                            </div>
    
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password">
                                </div>
                            </div>
    
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="password">Assign Roles</label>
                                    <select name="roles[]" id="roles" class="form-control select2" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                        </form>
                        
                    </div>
                </div>
            </div>
            <!-- Dark table end -->
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endsection

