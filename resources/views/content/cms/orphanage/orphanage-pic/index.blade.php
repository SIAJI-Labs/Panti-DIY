@extends('layouts.cms', [
    'wsecond_title' => 'Orphanage PIC',
    'sidebar_menu' => 'orphanage',
    'sidebar_submenu' => 'pic',
    'wheader' => [
        'header_title' => 'Orphanage PIC',
        'header_breadcrumb' => [
            [
                'title' => 'Dashboard',
                'is_active' => false,
                'url' => route('cms.index')
            ], [
                'title' => 'Orphanage PIC',
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
        <form class="card card-primary card-outline" id="orphanage_pic-form" action="{{ route('cms.orphanage-pic.store') }}" method="POST">
            <div class="card-header">
                <h3 class="card-title">Form (Insert)</h3>
            </div>
            <div class="card-body">
                <input type="hidden" name="_method" id="_method" value="POST">

                <div class="form-group">
                    <label>Orphanage</label>
    
                    <select class="form-control" id="input-orphanage_id" name="orphanage_id"></select>
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="input-name" class="form-control" placeholder="Person in Charge Name">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control select2" name="type" id="input-type">
                        <option value="">- Please Select Type -</option>
                        <option value="phone">Phone</option>
                        <option value="whatsapp">Whatsapp</option>
                        <option value="mobile">Mobile Phone</option>
                        <option value="email">Email</option>
                        <option value="address">Address</option>
                    </select>
                </div>
                <div id="form-contact" class="form-group form-dynamic">
                    <label>Contact</label>
                    <input type="text" name="contact" id="input-contact" class="form-control" placeholder="Contact">
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
                <div id="form-mobile" class="form-group form-dynamic" style="display: none">
                    <label>Mobile Phone</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+62</span>
                        </div>
                        <input type="text" name="mobile" id="input-mobile" class="form-control" placeholder="Mobile Phone Number">
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
                <h3 class="card-title">Orphanage PIC Management</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" id="orphanage_pic-table">
                    <thead>
                        <tr>
                            <th>Orphanage</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Orphanage</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Contact</th>
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
{{-- Select2 --}}
<script src="{{ mix('assets/plugins/select2/js/select2.js') }}"></script>
@endsection

@section('js_inline')
<script>
    $(document).ready(() => {
        let select2_query = {};
        // Orphanage Select2
        $("#input-orphanage_id").select2({
            placeholder: 'Search Orphanage',
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
                url: "{{ route('json.select2.orphanage.all') }}",
                delay: 250,
                data: function (params) {
                    var query = {
                        search: params.term,
                        page: params.page || 1
                    }

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },
                processResults: function (data, params) {
                    var items = $.map(data.data, function(obj){
                        obj.id = obj.id;
                        obj.text = obj.name;

                        return obj;
                    });
                    params.page = params.page || 1;

                    // console.log(items);
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: items,
                        pagination: {
                            more: params.page < data.last_page
                        }
                    };
                },
            },
            templateResult: function (item) {
                // console.log(item);
                // No need to template the searching text
                if (item.loading) {
                    return item.text;
                }
                
                var term = select2_query.term || '';
                var $result = markMatch(item.text, term);

                return $result;
            },
            language: {
                searching: function (params) {
                    // Intercept the query as it is happening
                    select2_query = params;
                    
                    // Change this to be appropriate for your application
                    return 'Searching...';
                }
            }
        });

        // Datatable
        $("#orphanage_pic-table").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('json.datatable.orphanage-pic.all') }}",
                type: "GET",
            },
            success: (result) => {
                // console.log(result);
            },
            columns: [
                { "data": 'orphanage.name' },
                { "data": 'name' },
                { "data": 'type' },
                { "data": 'contact' },
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
                        return row;
                    }
                }, {
                    "targets": 2,
                    "render": (row, type, data) => {
                        return ucwords(row);
                    }
                }, {
                    "targets": 3,
                    "render": (row, type, data) => {
                        let value = row;
                        if(data.type == 'whatsapp' || data.type == 'mobile'){
                            value = '+62'+row;
                        }
                        return value;
                    }
                }, {
                    "targets": 4,
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

        $("#orphanage_pic-table").DataTable().ajax.reload();
    });
    // Set Active Form
    $("#input-type").change((e) => {
        let data = $(e.target);
        let form_dynamic = $(".form-dynamic");
        console.log(data.val());

        $(".form-dynamic").hide();

        if(data.val() == 'whatsapp'){
            $("#form-whatsapp").show();
        } else if(data.val() == 'mobile'){
            $("#form-mobile").show();
        } else {
            $("#form-contact").show();
        }
    });

    // Form Submit
    $("#orphanage_pic-form").submit((e) => {
        e.preventDefault();
        let form = $(e.target);
        let action_url = form.attr('action');
        let data = form.serialize();

        // Remove Error
        $('.form-control').removeClass('is-invalid');
        $('.form-group .text-danger').remove();

        $.post(action_url, data, (result) =>{
            // console.log(result);
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
        let form = $("#orphanage_pic-form");

        form.attr('action', "{{ route('cms.orphanage-pic.store') }}");
        form.find('.card-title').text('Form (Insert)');

        $("#_method").val("POST");
        $("#input-orphanage_id").val('').trigger('change');
        $("#input-name").val('');
        $("#input-type").val('').trigger('change');
        $("#input-contact").val('');
        $("#input-whatsapp").val('');
        $("#input-mobile").val('');
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

        $.get(`{{ route('json.orphanage-pic.all') }}/${id}`, (result) => {
            // console.log(result);
            let data = result.data;
            let form = $("#orphanage_pic-form");

            form.attr('action', `{{ route('cms.orphanage-pic.index') }}/${data.id}`);
            form.find('.card-title').text('Form (Update)');

            $("#_method").val("PUT");
            var $select_option = $(`<option selected='selected'></option>`)
                .val(data.orphanage.id)
                .text(data.orphanage.name);
            $("#input-orphanage_id").append($select_option).trigger('change');
            $("#input-name").val(data.name);
            $("#input-type").val(data.type).trigger('change');
            if(data.type == 'whatsapp'){
                $("#input-whatsapp").val(data.contact);
            } else if(data.type == 'mobile'){
                $("#input-mobile").val(data.contact);
            } else {
                $("#input-contact").val(data.contact);
            }
        }).always((e) => {
            $('.btn').removeClass('disabled');
        });
    }
</script>
@endsection