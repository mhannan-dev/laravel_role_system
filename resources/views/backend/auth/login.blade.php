@extends('backend.auth.auth_master')

@section('auth-content')
<div class="login-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-box ptb--100">

                    <form action="{{ route('admin.login.submit') }}" method="POST">
                        @csrf

                        <div class="login-form-head">
                            <h4>Sign In</h4>

                        </div>

                        <div class="login-form-body">
                            @include('backend.partials.messages')
                            <div class="form-gp">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" id="exampleInputEmail1" name="email">
                                <i class="ti-email"></i>
                                <div class="text-danger"></div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-gp">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" id="exampleInputPassword1" name="password">
                                <i class="ti-lock"></i>
                                <div class="text-danger"></div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-4 rmber-area">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember">
                                        <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="#">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="submit-btn-area">
                                <button id="form_submit" type="submit">Login <i class="ti-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
