@extends('layouts.cms', [
    'wsecond_title' => 'Orphanage',
    'sidebar_menu' => 'orphanage',
    'sidebar_submenu' => 'list',
    'wheader' => [
        'header_title' => 'Orphanage',
        'header_breadcrumb' => [
            [
                'title' => 'Dashboard',
                'is_active' => false,
                'url' => route('cms.index')
            ], [
                'title' => 'Orphanage',
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
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Orphanage List</h3>

        <div class="card-tools">
            <a href="{{ route('cms.orphanage.create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Add new Orphanage">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped table-bordered" id="orphanage-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
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
        $("#orphanage-table").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('json.datatable.orphanage.all') }}",
                type: "GET",
            },
            success: (result) => {
                console.log(result);
            },
            columns: [
                { "data": 'name' },
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
                    "searchable": false,
                    "orderable": false,
                    "render": (row, type, data) => {
                        return `
                            <div class="btn-group">
                                <a class="btn btn-sm btn-warning btn-action" href="{{ route('cms.orphanage.index') }}/${data.id}/edit">
                                    <i class="far fa-edit mr-1"></i> Edit
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

        $("#orphanage-table").DataTable().ajax.reload();
    });
</script>
@endsection