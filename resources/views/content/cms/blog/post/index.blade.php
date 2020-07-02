@extends('layouts.cms', [
    'wsecond_title' => 'Post',
    'sidebar_menu' => 'post',
    'sidebar_submenu' => null,
    'wheader' => [
        'header_title' => 'Post',
        'header_breadcrumb' => [
            [
                'title' => 'Dashboard',
                'is_active' => false,
                'url' => route('cms.index')
            ], [
                'title' => 'Post',
                'is_active' => true,
                'url' => null
            ]
        ]
    ]
])

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Title</h3>

        <div class="card-tools">
            <a href="{{ route('cms.post.create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Add new Post">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
    </div>
    <div class="card-body">
        Start creating your amazing application!
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
</div>
@endsection