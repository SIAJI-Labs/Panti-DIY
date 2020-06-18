@extends('layouts.cms', [
    'wsecond_title' => 'Social Account',
    'sidebar_menu' => 'social-media',
    'sidebar_submenu' => 'social-account',
    'wheader' => [
        'header_title' => 'Social Account',
        'header_breadcrumb' => [
            [
                'title' => 'Dashboard',
                'is_active' => false,
                'url' => route('cms.index')
            ], [
                'title' => 'Social Account',
                'is_active' => true,
                'url' => null
            ]
        ]
    ]
])

@section('css_plugins')
<link href="{{ mix('assets/plugins/fontawesome-iconpicker/css/fontawesome-iconpicker.css') }}" rel="stylesheet">
{{-- Datatable --}}
<link href="{{ mix('assets/plugins/datatables/bs4/css/datatables.bs4.css') }}" rel="stylesheet">
<link href="{{ mix('assets/plugins/datatables/responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
{{-- Select2 --}}
<link href="{{ mix('assets/plugins/select2/css/select2.css') }}" rel="stylesheet">
<link href="{{ mix('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet">
{{-- Sweetalert2 --}}
<link href="{{ mix('assets/plugins/sweetalert2/css/sweetalert2.css') }}" rel="stylesheet">
<link href="{{ mix('assets/plugins/sweetalert2/css/bootstrap-4.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-lg-4">
        <form class="card card-primary card-outline" id="social_account-form" action="{{ route('cms.social-account.store') }}" method="POST">
            <div class="card-header">
                <h3 class="card-title">Form (Insert)</h3>
            </div>
            <div class="card-body">
                <input type="hidden" name="_method" id="_method" value="POST">

                <div class="form-group">
                    <label>Platform</label>
                    <select class="form-control select2" name="platform_id" id="input-platform_id">
                        <option value="">- Please Select Platform -</option>
                        @foreach ($platforms as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="input-name" class="form-control" placeholder="Account Name">
                </div>
                <div class="form-group">
                    <label>URL</label>
                    <input type="text" name="link" id="input-link" class="form-control" placeholder="Account URL">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="btn-group float-right">
                    <button type="button" id="button-reset" class="btn btn-sm btn-danger">Reset</button>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </div>
            <!-- /.card-footer-->
        </form>
    </div>
    <div class="col-12 col-lg-8">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Social Account Management</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" id="social_account-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="button" id="button-refresh" class="btn btn-sm btn-secondary"><i class="fas fa-sync-alt mr-1"></i>Reload Data</button>
            </div>
            <!-- /.card-footer-->
        </div>
    </div>
</div>
@endsection

@section('js_plugins')
<script src="{{ mix('assets/plugins/fontawesome-iconpicker/js/fontawesome-iconpicker.js') }}"></script>
{{-- Datatable --}}
<script src="{{ mix('assets/plugins/datatables/datatables.js') }}"></script>
<script src="{{ mix('assets/plugins/datatables/bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ mix('assets/plugins/datatables/responsive/js/dataTables.responsive.js') }}"></script>
<script src="{{ mix('assets/plugins/datatables/responsive/js/responsive.bootstrap4.js') }}"></script>
{{-- Select2 --}}
<script src="{{ mix('assets/plugins/select2/js/select2.js') }}"></script>
{{-- Sweetalert2 --}}
<script src="{{ mix('assets/plugins/sweetalert2/js/sweetalert2.js') }}"></script>
@endsection

@section('js_inline')
<script>
    $(document).ready(() => {
        // Select2
        $(".select2").select2({
            theme: 'bootstrap4'
        });

        // Datatable
        $("#social_account-table").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('json.datatable.social-account.all') }}",
                type: "GET",
            },
            success: (result) => {
                console.log(result);
            },
            columns: [
                { "data": "name" },
                { "data": "link" },
                { "data": null }
            ],
            columnDefs: [
                {
                    "targets": 0,
                    "render": (row, type, data) => {
                        return row ?? '-';
                    }
                }, {
                    "targets": 1,
                    "render": (row, type, data) => {
                        return row ?? '-';
                    }
                }, {
                    "targets": 2,
                    "searchable": false,
                    "sortable": false,
                    "render": (row, type, data) => {
                        return `
                            <div class="btn-group">
                                <a class="btn btn-sm btn-warning btn-action" onclick="editAction('${data.id}')">
                                    <i class="far fa-edit mr-1"></i> Edit
                                </a>
                                <a class="btn btn-sm btn-danger btn-action text-white" onclick="deleteAction('${data.id}')">
                                    <i class="far fa-trash-alt mr-1"></i> Delete
                                </a>
                            </div>
                        `;
                    }
                },
            ]

        });
    });

    // Refresh Data
    $("#button-refresh").click((e) => {
        e.preventDefault();

        $("#social_account-table").DataTable().ajax.reload();
    });

    // Form Submit
    $("#social_account-form").submit((e) => {
        e.preventDefault();
        let form = $(e.target);
        let action_url = form.attr('action');
        let data = form.serialize();

        // Remove Error
        $('.form-control').removeClass('is-invalid');
        $('.form-group .text-danger').remove();

        $.post(action_url, data, (result) =>{
            console.log(result);
            $("#button-refresh").click();
            $("#button-reset").click();
        }).fail((jqXHR, textStatus, errorThrown) => {
            console.log("Ajax Fail");
            console.log(jqXHR);

            $.each(jqXHR.responseJSON.errors, (key, result) => {
                $("#input-"+key).addClass('is-invalid');
                $("#input-"+key).closest('.form-group').append(`<small class="text-danger">${result}</small>`);
            });
        });
    });
    // Form Reset
    $("#button-reset").click((e) => {
        e.preventDefault();
        let form = $("#social_account-form");

        form.attr('action', "{{ route('cms.social-account.store') }}");
        form.find('.card-title').text('Form (Insert)');

        $("#_method").val("POST");
        $("#input-platform_id").val('').trigger('change');
        $("#input-name").val('');
        $("#input-link").val('');
        // Remove Error
        $('.form-control').removeClass('is-invalid');
        $('.form-group .text-danger').remove();
    });

    // Edit Action
    function editAction(id){
        $('.btn').addClass('disabled');
        // Remove Error
        $('.form-control').removeClass('is-invalid');
        $('.form-group .text-danger').remove();

        $.get(`{{ route('json.social-account.all') }}/${id}`, (result) => {
            console.log(result);
            let data = result.data;
            let form = $("#social_account-form");

            form.attr('action', `{{ route('cms.social-account.index') }}/${id}`);
            form.find('.card-title').text('Form (Update)');

            $("#_method").val("PUT");
            $("#input-platform_id").val(data.platform_id).trigger('change');
            $("#input-name").val(data.name);
            $("#input-link").val(data.link);
        }).always((e) => {
            $('.btn').removeClass('disabled');
        });
    }
    // Delete Action
    function deleteAction(id){
        $('.btn').addClass('disabled');

        Swal.fire({
            title: 'Are you sure?',
            text: "Once this data is deleted, you cannot restore it!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
            cancelButtonText: 'No, cancel!',
            reverseButtons: true,
            preConfirm: (value) => {
                console.log(id);
                $.post(`{{ route('cms.social-account.index') }}/${id}`, {'_method': 'DELETE'}, (result) => {
                    $("#button-refresh").click();
                });
            },
        }).then((result) => {
            console.log(result);
            $('.btn').removeClass('disabled');
        });
    }
</script>
@endsection