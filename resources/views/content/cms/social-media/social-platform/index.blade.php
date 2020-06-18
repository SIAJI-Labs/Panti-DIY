@extends('layouts.cms', [
    'wsecond_title' => 'Social Platform',
    'sidebar_menu' => 'social-media',
    'sidebar_submenu' => 'social-platform',
    'wheader' => [
        'header_title' => 'Social Platform',
        'header_breadcrumb' => [
            [
                'title' => 'Dashboard',
                'is_active' => false,
                'url' => route('cms.index')
            ], [
                'title' => 'Social Platform',
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
{{-- Sweetalert2 --}}
<link href="{{ mix('assets/plugins/sweetalert2/css/sweetalert2.css') }}" rel="stylesheet">
<link href="{{ mix('assets/plugins/sweetalert2/css/bootstrap-4.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-lg-4">
        <form class="card card-primary card-outline" id="social_platform-form" action="{{ route('cms.social-platform.store') }}" method="POST">
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
                    <label>Short Description</label>
                    <input type="text" name="description" id="input-description" class="form-control" placeholder="Platform Short Description">
                </div>
                <div class="form-group">
                    <label>Icon</label>
                    <div class="input-group">
                        <input data-placement="topRight" class="form-control icp icp-auto" placeholder="Platform Icon" type="text" id="input-icon" name="icon" style="background:#fff !important" readonly/>
                        <span class="input-group-append">
                            <span class="input-group-text iconpicker-component">
                                <i class="far fa-square"></i>
                            </span>
                        </span>
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
                <h3 class="card-title">Social Platform Management</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" id="social_platform-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Short Description</th>
                            <th>Icon</th>
                            <th>Linked Account</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Short Description</th>
                            <th>Icon</th>
                            <th>Linked Account</th>
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
{{-- Sweetalert2 --}}
<script src="{{ mix('assets/plugins/sweetalert2/js/sweetalert2.js') }}"></script>
@endsection

@section('js_inline')
<script>
    $(document).ready(() => {
        $('#input-icon').iconpicker({
            hideOnSelect: true,
            icons: [
                {
                    title: "fab fa-500px",
                    searchTerms: ['500px']
                }, {
                    title: "fab fa-dribbble",
                    searchTerms: ['dribbble']
                }, {
                    title: "fab fa-dribbble-square",
                    searchTerms: ['dribbble']
                }, {
                    title: "fab fa-facebook-f",
                    searchTerms: ['facebook', 'fb']
                }, {
                    title: "fab fa-facebook",
                    searchTerms: ['facebook', 'fb']
                }, {
                    title: "fab fa-facebook-square",
                    searchTerms: ['facebook', 'fb']
                }, {
                    title: "fab fa-facebook-messenger",
                    searchTerms: ['facebook', 'fb']
                }, {
                    title: "fab fa-google-plus",
                    searchTerms: ['google']
                }, {
                    title: "fab fa-google-plus-g",
                    searchTerms: ['google']
                }, {
                    title: "fab fa-google-plus-square",
                    searchTerms: ['google']
                }, {
                    title: "fab fa-instagram",
                    searchTerms: ['instagram']
                }, {
                    title: "fab fa-linkedin-in",
                    searchTerms: ['linkedin']
                }, {
                    title: "fab fa-linkedin",
                    searchTerms: ['linkedin']
                }, {
                    title: "fab fa-line",
                    searchTerms: ['line']
                }, {
                    title: "fab fa-slack",
                    searchTerms: ['slack']
                }, {
                    title: "fab fa-telegram",
                    searchTerms: ['telegram']
                }, {
                    title: "fab fa-telegram-plane",
                    searchTerms: ['telegram']
                }, {
                    title: "fab fa-tumblr",
                    searchTerms: ['tumblr']
                }, {
                    title: "fab fa-tumblr-square",
                    searchTerms: ['tumblr']
                }, {
                    title: "fab fa-twitter-square",
                    searchTerms: ['twitter']
                }, {
                    title: "fab fa-twitter",
                    searchTerms: ['twitter']
                }, {
                    title: "fab fa-whatsapp",
                    searchTerms: ['whatsapp', 'wa']
                }, {
                    title: "fab fa-whatsapp-square",
                    searchTerms: ['whatsapp', 'wa']
                }, {
                    title: "fab fa-youtube",
                    searchTerms: ['youtube']
                }, {
                    title: "fab fa-youtube-square",
                    searchTerms: ['youtube']
                }, 
            ],
        });

        $(".iconpicker-component").html('<i class="far fa-square"></i>');

        // Datatable
        $("#social_platform-table").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('json.datatable.social-platform.all') }}",
                type: "GET",
            },
            success: (result) => {
                console.log(result);
            },
            columns: [
                { "data": "name" },
                { "data": "description" },
                { "data": "icon" },
                { "data": "social_account_count" },
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
                            <a class="btn btn-sm btn-secondary">
                                <i class="fab fa-${row} text-white"></i>
                            </a>
                        `;
                    }
                }, {
                    "targets": 3,
                    "searchable": false,
                    "sortable": true,
                    "render": (row, type, data) => {
                        return row;
                    }
                }, {
                    "targets": 4,
                    "searchable": false,
                    "sortable": false,
                    "render": (row, type, data) => {
                        let has_child = false;
                        if(data.social_account_count > 0){
                            has_child = true;
                        }
                        return `
                            <div class="btn-group">
                                <a class="btn btn-sm btn-warning btn-action" onclick="editAction('${data.id}')">
                                    <i class="far fa-edit mr-1"></i> Edit
                                </a>
                                <a class="btn btn-sm btn-danger btn-action text-white" onclick="deleteAction('${data.id}', ${has_child})">
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

        $("#social_platform-table").DataTable().ajax.reload();
    });

    // Form Submit
    $("#social_platform-form").submit((e) => {
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
        let form = $("#social_platform-form");

        form.attr('action', "{{ route('cms.social-platform.store') }}");
        form.find('.card-title').text('Form (Insert)');

        $("#_method").val("POST");
        $("#input-name").val('');
        $("#input-description").val('');
        $("#input-icon").val('');
        $(".iconpicker-component").html(`<i class="far fa-box"></i>`);
        $(".iconpicker-item").removeClass('iconpicker-selected bg-primary');
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

        $.get(`{{ route('json.social-platform.all') }}/${id}`, (result) => {
            console.log(result);
            let data = result.data;
            let form = $("#social_platform-form");

            form.attr('action', `{{ route('cms.social-platform.index') }}/${id}`);
            form.find('.card-title').text('Form (Update)');

            $("#_method").val("PUT");
            $("#input-name").val(data.name);
            $("#input-description").val(data.description);
            $("#input-icon").val(data.icon);
            $(".iconpicker-component").html(`<i class="${data.icon}"></i>`);
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
                    $.post(`{{ route('cms.social-platform.index') }}/${id}`, {'_method': 'DELETE'}, (result) => {
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
                    $.post(`{{ route('cms.social-platform.index') }}/${id}`, {'_method': 'DELETE'}, (result) => {
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