@extends('layouts.auth', [
    'wsecond_title' => 'Password Reset'
])

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('public.index') }}"><b>{{ $wtitlle ?? 'SIAJI' }}</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Reset Your Password</p>

            @if(Session::get('message'))
            <!-- Content Message (Page header) -->
            <div class="alert alert-{{ Session::get('status') ?? 'info' }} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5>
                    @if(Session::get('message_icon'))
                    <i class="icon fas fa-{{ Session::get('message_icon') ?? 'info' }}"></i>
                    @endif {{ Session::get('status') ? ucwords(Session::get('status')) : 'Info' }}!</h5>
                {{ Session::get('message') }}
            </div>
            @endif
  
            <form action="{{ route('password.update') }}" method="POST" id="form-password">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ request()->get('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Re-Type Password to Confirm">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password_confirmation')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-5 offset-7">
                        <button type="submit" class="btn btn-primary btn-block" id="btn-submit">Submit</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
        <div class="card-footer">
                <p class="mb-1">
                    <a href="{{ route('login') }}" class="d-flex align-items-center">
                        <i class="far fa-arrow-alt-circle-left text-dark"></i>
                        <span class="ml-2">Back to Login Page</span>
                    </a>
                </p>
        </div>
    </div>
</div>
@endsection

@section('js_inline')
<script>
    $("#form-password").submit((e) => {
        $(".form-control").removeClass('is-invalid');
        $(".form-group .invalid-feedback").remove();

        $("#btn-submit").html(`
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
        `);
    });
</script>
@endsection