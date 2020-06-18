@extends('layouts.cms', [
    'wsecond_title' => 'Contact Data',
    'sidebar_menu' => 'setting',
    'sidebar_submenu' => 'contact',
    'wheader' => [
        'header_title' => 'Contact Data',
        'header_breadcrumb' => [
            [
                'title' => 'Dashboard',
                'is_active' => false,
                'url' => route('cms.index')
            ], [
                'title' => 'Contact Data',
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
        <form class="card card-primary card-outline" id="contact_data-form" action="{{ route('cms.contact-data.store') }}" method="POST">
            <div class="card-header">
                <h3 class="card-title">Form (Insert)</h3>
            </div>
            <div class="card-body">
                <input type="hidden" name="_method" id="_method" value="POST">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="input-name" class="form-control" placeholder="Platform Name">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control select2" name="type" id="input-type">
                        <option value="">- Please Select Type -</option>
                        <option value="phone">Phone</option>
                        <option value="whatsapp">Whatsapp</option>
                        <option value="email">Email</option>
                        <option value="maps">Maps</option>
                    </select>
                </div>
                <div id="form-value" class="form-group form-dynamic">
                    <label>Value</label>
                    <input type="text" name="value" id="input-value" class="form-control" placeholder="Value">
                </div>
                <div id="form-maps" class="form-group form-dynamic" style="display: none">
                    <label>Coordinate</label>
                    <div class="form-row">
                        <div class="col-12 col-lg-6 form-group mb-0">
                            <input type="text" name="longitude" id="input-longitude" class="form-control" placeholder="Longitude">
                        </div>
                        <div class="col-12 col-lg-6 form-group mb-0">
                            <input type="text" name="latitude" id="input-latitude" class="form-control" placeholder="Latitude">
                        </div>
                    </div>
                </div>
                <div id="form-whatsapp" class="form-group form-dynamic" style="display: none">
                    <label>Whatsapp</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+62</span>
                        </div>
                        <input type="text" name="whatsapp" id="input-whatsapp" class="form-control" placeholder="Whatsapp Phone Number">
                    </div>
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
                <h3 class="card-title">Contact Data Management</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" id="contact_data-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
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
        $("#contact_data-table").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('json.datatable.contact-data.all') }}",
                type: "GET",
            },
            success: (result) => {
                console.log(result);
            },
            columns: [
                { "data": 'name' },
                { "data": 'type' },
                { "data": 'value' },
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
                        return ucwords(row);
                    }
                }, {
                    "targets": 2,
                    "render": (row, type, data) => {
                        let value = row;
                        if(data.type == 'whatsapp'){
                            value = '+62'+row;
                        }
                        return value;
                    }
                }, {
                    "targets": [3],
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

        $("#contact_data-table").DataTable().ajax.reload();
    });
    // Set Active Form
    $("#input-type").change((e) => {
        let data = $(e.target);
        let form_dynamic = $(".form-dynamic");
        console.log(data.val());

        $(".form-dynamic").hide();
        if(data.val() == 'whatsapp'){
            $("#form-whatsapp").show();
        } else if(data.val() == 'maps') {
            $("#form-maps").show();
        } else {
            $("#form-value").show();
        }
    });

    // Form Submit
    $("#contact_data-form").submit((e) => {
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
        let form = $("#contact_data-form");

        form.attr('action', "{{ route('cms.contact-data.store') }}");
        form.find('.card-title').text('Form (Insert)');

        $("#_method").val("POST");
        $("#input-name").val('');
        $("#input-type").val('').trigger('change');
        $("#input-value").val('');
        $("#input-longitude").val('');
        $("#input-latitude").val('');
        $("#input-whatsapp").val('');
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

        $.get(`{{ route('json.contact-data.all') }}/${id}`, (result) => {
            console.log(result);
            let data = result.data;
            let form = $("#contact_data-form");

            form.attr('action', `{{ route('cms.contact-data.index') }}/${data.id}`);
            form.find('.card-title').text('Form (Update)');

            $("#_method").val("PUT");
            $("#input-name").val(data.name);
            $("#input-type").val(data.type).trigger('change');
            if(data.type == 'maps'){
                data = data.value.split(",");
                console.log(data);
                $("#input-longitude").val(data[0]);
                $("#input-latitude").val(data[1]);
            } else if(data.type == 'whatsapp'){
                $("#input-whatsapp").val(data.value);
            } else {
                $("#input-value").val(data.value);
            }
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
                $.post(`{{ route('cms.contact-data.index') }}/${id}`, {'_method': 'DELETE'}, (result) => {
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