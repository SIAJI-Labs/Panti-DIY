@extends('layouts.cms', [
    'wsecond_title' => 'Profile',
    'sidebar_menu' => 'profile',
    'sidebar_submenu' => null,
    'wheader' => [
        'header_title' => 'Profile',
        'header_breadcrumb' => [
            [
                'title' => 'Dashboard',
                'is_active' => false,
                'url' => route('cms.index')
            ], [
                'title' => 'Profile',
                'is_active' => true,
                'url' => null
            ]
        ]
    ]
])

@section('content')
<div class="row">
    <div class="col-12 col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('assets/adminlte/img/user4-128x128.jpg') }}"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Created at</b> <a class="float-right">{{ date("F d, Y / H:i", strtotime(Auth::user()->created_at)) }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Last Update</b> <a class="float-right">{{ date("F d, Y / H:i", strtotime(Auth::user()->updated_at)) }}</a>
                    </li>
                </ul>

                <a href="javascript:void(0)" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-password" data-backdrop="static" data-keyboard="false"><b>Change Password</b></a>
            </div>
            <!-- /.card-body -->
          </div>
        <!-- /.card -->
    </div>

    <div class="col-12 col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="settings">
                        <form class="form-horizontal" action="{{ route('cms.profile.update', Auth::user()->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="input-name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="input-name" placeholder="Name" value="{{ Auth::user()->name }}">
                                    @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="input-username" placeholder="Username" value="{{ Auth::user()->username }}">
                                    @error('username')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-name" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="input-email" placeholder="Email" value="{{ Auth::user()->email }}">
                                    @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
    </div>
</div>
@endsection

@section('content_modal')
<!-- Modal -->
<form action="{{ route('cms.profile.password') }}" method="POST" class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="modal_label-password" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_label-password">Password Update</h5>
                <button type="button" class="close btn-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id="input-password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="input-password_confirmation" class="form-control" placeholder="Re-Type Password to Confirm">
                </div>
                <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" name="old_password" id="input-old_password" class="form-control" placeholder="Old Password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-modal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn-submit_password">Save changes</button>
            </div>
        </div>
    </div>
</form>
@endsection

@section('js_inline')
<script>
    $("#modal-password").submit((e) => {
        e.preventDefault();

        $(".form-control").removeClass('is-invalid');
        $(".form-group .invalid-feedback").remove();
        $("#btn-submit_password").html(`
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
        `).attr('disabled', true);
        $(".btn-modal").addClass('disabled').attr('disabled', true);

        $.post($(e.target).attr('action'), $(e.target).serialize(), (result) => {
            console.log("Ajax Success");
            console.log(result);

            $(e.target).modal('hide');
            $(`
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display:none;">
                <span>${result.message}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            `).appendTo($("#ajax-alert")).slideDown();
        }).fail((jqXHR, textStatus, errorThrown) => {
            console.log("Ajax Fail");
            console.log(jqXHR);

            $.each(jqXHR.responseJSON.errors, (key, result) => {
                $("#input-"+key).addClass('is-invalid');
                $("#input-"+key).closest('.form-group').append(`<span class="invalid-feedback">${result}</span>`);
            });
        }).always((e) => {
            $("#btn-submit_password").html('Save changes').attr('disabled', false);
            $(".btn-modal").removeClass('disabled').attr('disabled', false);
        });
    });
</script>
@endsection