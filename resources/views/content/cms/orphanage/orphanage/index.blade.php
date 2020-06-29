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
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="button" id="button-refresh" class="btn btn-sm btn-secondary"><i class="fas fa-sync-alt mr-1"></i>Reload Data</button>
    </div>
    <!-- /.card-footer-->
</div>
@endsection