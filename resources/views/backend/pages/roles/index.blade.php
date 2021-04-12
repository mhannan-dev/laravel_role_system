@extends('backend.layouts.master')
@section('title', 'Roles Page')
@section('main-content')
<div class="main-content-inner">
    <div class="row">
        <!-- Dark table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="float-right mb-2">
                        <a href={{ route('roles.create') }} class="btn btn-dark btn-sm"><i class="fa fa-plus-circle"></i> &nbsp;Add {{$title}}</a>
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
                                @foreach ($roles as $role )
                                    
                                
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->guard_name }}</td>
                                    <td>
                                        <a href=""><i class="fa fa-trash fa-2x text-danger"></i></a> &nbsp;
                                        <a href=""><i class="fa fa-edit fa-2x text-warning"></i></a>
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