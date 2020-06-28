@extends('layouts.cms', [
    'wsecond_title' => 'Statistic',
    'sidebar_menu' => 'feature-manager',
    'sidebar_submenu' => 'statistic',
    'wheader' => [
        'header_title' => 'Statistic',
        'header_breadcrumb' => [
            [
                'title' => 'Dashboard',
                'is_active' => false,
                'url' => route('cms.index')
            ], [
                'title' => 'Statistic',
                'is_active' => true,
                'url' => null
            ]
        ]
    ]
])

@section('css_plugins')
{{-- Datatable --}}
<link href="{{ mix('assets/plugins/datatables/bs4/css/datatables.bs4.css') }}" rel="stylesheet">
<link href="{{ mix('assets/plugins/datatables/responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
{{-- Sweetalert2 --}}
<link href="{{ mix('assets/plugins/sweetalert2/css/sweetalert2.css') }}" rel="stylesheet">
<link href="{{ mix('assets/plugins/sweetalert2/css/bootstrap-4.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-lg-4">
        <form class="card card-primary card-outline" id="statistic-form" action="{{ route('cms.statistic.store') }}" method="POST">
            <div class="card-header">
                <h3 class="card-title">Form (Insert)</h3>
            </div>
            <div class="card-body">
                <div id="preview-container" class="mb-2">
                    <div class="small-box bg-secondary mb-0">
                        <div class="inner">
                            <h3 id="preview-title" class="d-flex align-items-center">
                                <small id="preview-prefix">{prefix}</small>
                                <span id="preview-value" class="mx-2">{Value}</span>
                                <small id="preview-suffix">{suffix}</small>
                            </h3>
                            <p id="preview-text">{Name}</p>
                        </div>
                        <div class="icon">
                            <i id="preview-icon" class="far fa-square"></i>
                        </div>
                    </div>
                    <small class="text-muted">*This is just preview, end result may different</small>
                </div>

                <input type="hidden" name="_method" id="_method" value="POST">

                <div class="form-group">
                    <label>Name{!! printRequired() !!}</label>
                    <input type="text" name="name" id="input-name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Short Description</label>
                    <input type="text" name="description" id="input-description" class="form-control" placeholder="Short Description">
                </div>
                <div class="form-group">
                    <label>Prefix</label>
                    <input type="text" name="prefix" id="input-prefix" class="form-control" placeholder="Statistic Prefix">
                </div>
                <div class="form-group">
                    <label>Value{!! printRequired() !!}</label>
                    <input type="text" name="value" id="input-value" class="form-control" placeholder="Statistic Value">
                </div>
                <div class="form-group">
                    <label>Suffix</label>
                    <input type="text" name="suffix" id="input-suffix" class="form-control" placeholder="Statistic Suffix">
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
                <h3 class="card-title">Statistic Management</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" id="statistic-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Short Description</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Short Description</th>
                            <th>Value</th>
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
{{-- Datatable --}}
<script src="{{ mix('assets/plugins/datatables/datatables.js') }}"></script>
<script src="{{ mix('assets/plugins/datatables/bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ mix('assets/plugins/datatables/responsive/js/dataTables.responsive.js') }}"></script>
<script src="{{ mix('assets/plugins/datatables/responsive/js/responsive.bootstrap4.js') }}"></script>
{{-- Sweetalert2 --}}
<script src="{{ mix('assets/plugins/sweetalert2/js/sweetalert2.js') }}"></script>
@endsection

@section('js_inline')
<script>
    $(document).ready(() => {
        // Datatable
        $("#statistic-table").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('json.datatable.statistic.all') }}",
                type: "GET",
            },
            success: (result) => {
                console.log(result);
            },
            columns: [
                { "data": "name" },
                { "data": "description" },
                { "data": "value" },
                { "data": null },
            ],
            columnDefs: [
                {
                    "targets": 0,
                    "render": (row, type, data) => {
                        return row;
                    }
                }, {
                    "targets": 1,
                    "render": (row, type, data) => {
                        return row ?? '-';
                    }
                }, {
                    "targets": 2,
                    "render": (row, type, data) => {
                        let stats = "";
                        if(data.prefix != null && data.prefix != ""){
                            stats += data.prefix
                        }
                        stats += row;
                        if(data.suffix != ""){
                            stats += data.suffix
                        }
                        return stats;
                    }
                }, {
                    "targets": 3,
                    "searchable": false,
                    "orderable": false,
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
        $("#statistic-table").DataTable().ajax.reload();
    });
    $("#input-name").change((e) => {
        let val = $(e.target).val();
        val.length > 0 ? $("#preview-text").html(`${val}`) : $("#preview-text").html(`{Name}`);
    });
    $("#input-prefix").change((e) => {
        let val = $(e.target).val();
        val.length > 0 ? $("#preview-prefix").html(`${val}`) : $("#preview-prefix").html(`{Prefix}`);
    });
    $("#input-value").change((e) => {
        let val = $(e.target).val();
        val.length > 0 ? $("#preview-value").html(`${val}`) : $("#preview-value").html(`{Value}`);
    });
    $("#input-suffix").change((e) => {
        let val = $(e.target).val();
        val.length > 0 ? $("#preview-suffix").html(`${val}`) : $("#preview-suffix").html(`{Suffix}`);
    });

    // Form Submit
    $("#statistic-form").submit((e) => {
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
        let form = $("#statistic-form");

        form.attr('action', "{{ route('cms.statistic.store') }}");
        form.find('.card-title').text('Form (Insert)');

        $("#_method").val("POST");
        $("#input-name").val('').trigger('change');
        $("#input-description").val('').trigger('change');
        $("#input-value").val('').trigger('change');
        $("#input-prefix").val('').trigger('change');
        $("#input-suffix").val('').trigger('change');
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

        $.get(`{{ route('json.statistic.all') }}/${id}`, (result) => {
            console.log(result);
            let data = result.data;
            let form = $("#statistic-form");

            form.attr('action', `{{ route('cms.statistic.index') }}/${id}`);
            form.find('.card-title').text('Form (Update)');

            $("#_method").val("PUT");
            $("#input-name").val(data.name).trigger('change');
            $("#input-description").val(data.description).trigger('change');
            $("#input-value").val(data.value).trigger('change');
            $("#input-prefix").val(data.prefix).trigger('change');
            $("#input-suffix").val(data.suffix).trigger('change');
        }).always((e) => {
            $('.btn').removeClass('disabled');
        });
    }
    // Delete Action
    function deleteAction(id, has_child){
        $('.btn').addClass('disabled');
        console.log(has_child)

        if(has_child){
            Swal.fire({
                title: 'Are you sure?',
                text: "Once this data is deleted, you cannot restore it! (This data has Linked Account)",
                icon: 'warning',
                input: 'text',
                inputPlaceholder: `Please type 'please' to delete`,
                inputValidator: (value) => {
                    if (!value) {
                        return 'You need to write something!'
                    } else if(value != 'please') {
                        return `Please type 'please' to delete (Without quotation)`
                    }
                },
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,
                preConfirm: (value) => {
                    console.log(id);
                    $.post(`{{ route('cms.statistic.index') }}/${id}`, {'_method': 'DELETE'}, (result) => {
                        $("#button-refresh").click();
                    });
                },
            }).then((result) => {
                console.log(result);
                $('.btn').removeClass('disabled');
            });
        } else {
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
                    $.post(`{{ route('cms.statistic.index') }}/${id}`, {'_method': 'DELETE'}, (result) => {
                        $("#button-refresh").click();
                    });
                },
            }).then((result) => {
                console.log(result);
                $('.btn').removeClass('disabled');
            });
        }
    }
</script>
@endsection