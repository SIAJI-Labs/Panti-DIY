@extends('layouts.auth', [
    'wsecond_title' => 'Forgot Password'
])

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('public.index') }}"><b>{{ $wtitlle ?? 'SIAJI' }}</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Forgot Your Password</p>

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
  
            <form action="{{ route('password.email') }}" method="POST" id="form-forgot">
                @csrf

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
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
    $("#form-forgot").submit((e) => {
        $(".form-control").removeClass('is-invalid');
        $(".form-group .invalid-feedback").remove();

        $("#btn-submit").html(`
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
        `);
    });
</script>
@endsection