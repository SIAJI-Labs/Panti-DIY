@extends('layouts.cms', [
    'wsecond_title' => 'Orphanage: Create',
    'sidebar_menu' => 'orphanage',
    'sidebar_submenu' => 'list',
    'wheader' => [
        'header_title' => 'Orphanage: Create',
        'header_breadcrumb' => [
            [
                'title' => 'Dashboard',
                'is_active' => false,
                'url' => route('cms.index')
            ], [
                'title' => 'Orphanage',
                'is_active' => false,
                'url' => route('cms.orphanage.index')
            ], [
                'title' => 'Create',
                'is_active' => true,
                'url' => null
            ]
        ]
    ]
])

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Create new Orphanage</h3>

        <div class="card-tools">
            <a href="{{ route('cms.orphanage.index') }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" title="Back to Orphanage List">
                <i class="far fa-arrow-alt-circle-left"></i> Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" id="input-name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
            @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" id="input-slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug">
            @error('slug')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <div class="row preview-container">
                <div class="col-12 col-lg-3">
                    <div class="img-preview mb-2">
                        <button type="button" class="btn btn-sm btn-danger d-block mb-2 mx-auto btn-preview_remove" onclick="removeCustomPreview($(this), '{{ !empty($wp_logo) ? asset('images/'.$wp_logo->value) : '' }}')" disabled>Reset Preview</button>
                        <img class="img-responsive" width="100%;" style="padding:.25rem;background:#eee;display:block;" @if(!empty($wp_logo)) src="{{ asset('images/'.$wp_logo->value) }}" @endif>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('logo.public') is-invalid @enderror" name="logo[public]" id="input_public-logo" onchange="generateCustomPreview($(this))">
                        <label class="custom-file-label" for="input_public-logo">Choose file</label>
                        @error('logo.public')
                        <div class='invalid-feedback'>{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Suggestion: Use a picture PNG extension / Max File Size is 500kb.</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Description</label>
            <div class="ckeditor"></div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-sync-alt mr-1"></i>Reset</button>
        </div>
    </div>
    <!-- /.card-footer-->
</div>
@endsection

@section('js_plugins')
<script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>
<script src="{{ mix('assets/plugins/ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ mix('assets/plugins/ckeditor5/build/config.js') }}"></script>
<script src="{{ mix('assets/plugins/bs-custom-file-input/bs-custom-file-input.js') }}"></script>
@endsection