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
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <input type="text" class="form-control" name="name" placeholder="Enter role name">
                            <div class="form-group">
                                <label for="name">Permissions</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                                    <label class="form-check-label" for="checkPermissionAll">All</label>
                                </div>
                                <hr>
                                
                                @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                    <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                                @endforeach
                            </div>
                            <button type="submit"  class="btn btn-primary mt-3">Save</button>
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
    
    $(document).ready(function() { //you can replace $ with Jquery
        $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 //Check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 //Un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });
    });
</script>

@endpush