@extends('backend.layouts.master')
@section('title', 'Roles Page')
@section('main-content')
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
                                    placeholder="Enter a Role Name">
                            </div>
                            <div class="form-group">
                                <label for="name">Permissions</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                                    <label class="form-check-label" for="checkPermissionAll">All</label>
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
                                                <label class="form-check-label"
                                                    for="checkPermission">{{ $group->name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-9 role-{{ $i }}-management-checkbox">
                                            @php
                                                $permissions = App\User::getpermissionsByGroupName($group->name);
                                                $j = 1;
                                            @endphp
                                            @foreach ($permissions as $permission)
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]"
                                                        id="checkPermission{{ $permission->id }}"
                                                        value="{{ $permission->name }}">
                                                    <label class="form-check-label"
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
@endsection
@push('scripts')
    <script type="text/javascript">
        $(function() {
            $("#checkPermissionAll").click(function() {
                if ($(this).is(':checked')) {
                    //Check all the checkbox
                    $('input[type=checkbox]').prop('checked', true);
                } else {
                    //Un check all the checkbox
                    $('input[type=checkbox]').prop('checked', false);
                }
            });
        });

        function checkPermissionByGroup(className, checkThis) {
            const groupIdName = $("#" + checkThis.id);
            const classCheckBox = $('.' + className + ' input');
            console.log(classCheckBox);
            if (groupIdName.is(':checked')) {
                classCheckBox.prop('checked', true);
            } else {
                classCheckBox.prop('checked', false);
            }
        }

    </script>
@endpush
