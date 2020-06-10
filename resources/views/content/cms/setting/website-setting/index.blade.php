@extends('layouts.cms', [
    'wsecond_title' => 'Website Setting',
    'sidebar_menu' => 'setting',
    'sidebar_submenu' => 'general',
    'wheader' => [
        'header_title' => 'Website Setting',
        'header_breadcrumb' => [
            [
                'title' => 'Dashboard',
                'is_active' => false,
                'url' => route('cms.index')
            ], [
                'title' => 'Website Setting',
                'is_active' => true,
                'url' => null
            ]
        ]
    ]
])

@section('css_plugins')
<link href="{{ mix('assets/plugins/sweetalert2/css/sweetalert2.css') }}" rel="stylesheet">
<link href="{{ mix('assets/plugins/sweetalert2/css/bootstrap-4.css') }}" rel="stylesheet">
@endsection

@section('content')
<form action="{{ route('cms.website-setting.store') }}" method="POST" class="card card-primary card-outline" id="website-form" enctype="multipart/form-data">
    <div class="card-header">
        <h3 class="card-title ws-title">{{ !empty(old('type')) ? (old('type') == 'public' ? 'Public Setting' : 'Cms Setting') : 'Public Setting' }}</h3>

        <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ !empty(old('type')) ? (old('type') == 'public' ? 'active' : '') : 'active' }}" href="#tab-public" data-setting_text="Public Setting" data-setting_type="public" data-toggle="tab">Public</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ !empty(old('type')) ? (old('type') == 'cms' ? 'active' : '') : '' }}" href="#tab-cms" data-setting_text="Cms Setting" data-setting_type="cms" data-toggle="tab">Cms</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        @csrf
        <input type="hidden" name="type" id="input-type" value="{{ old('type') ?? 'public' }}" readonly>

        <div class="tab-content p-0">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane {{ !empty(old('type')) ? (old('type') == 'public' ? 'active' : '') : 'active' }}" id="tab-public">
                <input type="hidden" name="action[public]" id="input_public-action" value="{{ !empty($wp_title) ? 'update' : 'new' }}" readonly>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control @error('title.public') is-invalid @enderror" name="title[public]" id="input_public-title" placeholder="Website Title" value="{{ !empty($wp_title) ? $wp_title->value : old('title.public') }}">
                    @error('title.public')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label>Short Description</label>
                    <input type="text" class="form-control @error('description.public') is-invalid @enderror" name="description[public]" id="input_public-description" placeholder="Website Short Description" value="{{ !empty($wp_description) ? $wp_description->value : old('description.public') }}">
                    @error('description.public')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card card-secondary card-outline" style="margin-left: 2px;">
                            <div class="card-header">
                                <h5 class="card-title mx-auto">Logo</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="preview-container">
                                        <div class="img-preview mb-2">
                                            <button type="button" class="btn btn-sm btn-danger d-block mb-2 mx-auto btn-preview_remove" onclick="removeCustomPreview($(this), '{{ !empty($wp_logo) ? asset('images/'.$wp_logo->value) : '' }}')" disabled>Reset Preview</button>
                                            <img class="img-responsive" width="100%;" style="padding:.25rem;background:#eee;display:block;" @if(!empty($wp_logo)) src="{{ asset('images/'.$wp_logo->value) }}" @endif>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('logo.public') is-invalid @enderror" name="logo[public]" id="input_public-logo" onchange="generateCustomPreview($(this))">
                                            <label class="custom-file-label" for="input_public-logo">Choose file</label>
                                            
                                            @error('logo.public')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted">Suggestion: Use a picture PNG extension / Max File Size is 500kb.</small>
                                            @if(!empty($wp_logo))
                                            <small class="text-muted">Leave it empty to keep old data</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-12 col-md-6">
                        <div class="card card-secondary card-outline" style="margin-right: 2px;">
                            <div class="card-header">
                                <h5 class="card-title mx-auto">Favicon</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="preview-container">
                                        <div class="img-preview mb-2">
                                            <button type="button" class="btn btn-sm btn-danger d-block mb-2 mx-auto btn-preview_remove" onclick="removeCustomPreview($(this), '{{ !empty($wp_favicon) ? asset('images/'.$wp_favicon->value) : '' }}')" disabled>Reset Preview</button>
                                            <img class="img-responsive" width="100%;" style="padding:.25rem;background:#eee;display:block;" @if(!empty($wp_favicon)) src="{{ asset('images/'.$wp_favicon->value) }}" @endif>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('favicon.public') is-invalid @enderror" name="favicon[public]" id="input_public-favicon" onchange="generateCustomPreview($(this))">
                                            <label class="custom-file-label" for="input_public-favicon">Choose file</label>
                                            
                                            @error('favicon.public')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted">Suggestion: Use a picture PNG extension / Max File Size is 500kb.</small>
                                            @if(!empty($wp_favicon))
                                            <small class="text-muted">Leave it empty to keep old data</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
            <div class="chart tab-pane {{ !empty(old('type')) ? (old('type') == 'cms' ? 'active' : '') : '' }}" id="tab-cms">
                <input type="hidden" name="action[cms]" id="input_cms-action" value="{{ !empty($wc_title) ? 'update' : 'new' }}" readonly>
                
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control @error('title.cms') is-invalid @enderror" name="title[cms]" id="input_cms-title" placeholder="Website Title" value="{{ !empty($wc_title) ? $wc_title->value : old('title.cms') }}">
                    @error('title.cms')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label>Short Description</label>
                    <input type="text" class="form-control @error('description.cms') is-invalid @enderror" name="description[cms]" id="input_cms-description" placeholder="Website Short Description" value="{{ !empty($wc_description) ? $wc_description->value : old('description.cms') }}">
                    @error('description.cms')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card card-secondary card-outline" style="margin-left: 2px;">
                            <div class="card-header">
                                <h5 class="card-title mx-auto">Logo</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="preview-container">
                                        <div class="img-preview mb-2">
                                            <button type="button" class="btn btn-sm btn-danger d-block mb-2 mx-auto btn-preview_remove" onclick="removeCustomPreview($(this), '{{ !empty($wc_logo) ? asset('images/'.$wc_logo->value) : '' }}')" disabled>Reset Preview</button>
                                            <img class="img-responsive" width="100%;" style="padding:.25rem;background:#eee;display:block;" @if(!empty($wc_logo)) src="{{ asset('images/'.$wc_logo->value) }}" @endif>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('logo.cms') is-invalid @enderror" name="logo[cms]" id="input_cms-logo" onchange="generateCustomPreview($(this))">
                                            <label class="custom-file-label" for="input_cms-logo">Choose file</label>
                                            
                                            @error('logo.cms')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted">Suggestion: Use a picture PNG extension / Max File Size is 500kb.</small>
                                            @if(!empty($wc_logo))
                                            <small class="text-muted">Leave it empty to keep old data</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-12 col-md-6">
                        <div class="card card-secondary card-outline" style="margin-right: 2px;">
                            <div class="card-header">
                                <h5 class="card-title mx-auto">Favicon</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="preview-container">
                                        <div class="img-preview mb-2">
                                            <button type="button" class="btn btn-sm btn-danger d-block mb-2 mx-auto btn-preview_remove" onclick="removeCustomPreview($(this), '{{ !empty($wc_favicon) ? asset('images/'.$wc_favicon->value) : '' }}')" disabled>Reset Preview</button>
                                            <img class="img-responsive" width="100%;" style="padding:.25rem;background:#eee;display:block;" @if(!empty($wc_favicon)) src="{{ asset('images/'.$wc_favicon->value) }}" @endif>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('favicon.cms') is-invalid @enderror" name="favicon[cms]" id="input_cms-favicon" onchange="generateCustomPreview($(this))">
                                            <label class="custom-file-label" for="input_cms-favicon">Choose file</label>
                                            
                                            @error('favicon.cms')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted">Suggestion: Use a picture PNG extension / Max File Size is 500kb.</small>
                                            @if(!empty($wc_favicon))
                                            <small class="text-muted">Leave it empty to keep old data</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
          </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer text-right">
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-danger" id="btn-reset">Reset</button>
            <button type="submit" class="btn btn-sm btn-primary" id="btn-submit">Submit</button>
        </div>
    </div>
    <!-- /.card-footer-->
</form>
@endsection

@section('js_plugins')
<script src="{{ mix('assets/plugins/bs-custom-file-input/bs-custom-file-input.js') }}"></script>
<script src="{{ mix('assets/plugins/sweetalert2/js/sweetalert2.js') }}"></script>
@endsection

@section('js_inline')
<script>
    $(document).ready(() => {
        bsCustomFileInput.init();
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', (e) => {
        let tab_active = $(e.target) // newly activated tab
        let tab_previous = $(e.relatedTarget) // previous active tab

        console.log(tab_active);
        console.log(tab_previous);

        $("#website-form .ws-title").text($(tab_active).data('setting_text'));
        $("#input-type").val($(tab_active).data('setting_type'))
    });

    $("#website-form").submit((e) => {
        $("#btn-submit").html(`
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
        `).attr('disabled', true);
    });
    $("#btn-reset").click((e) => {
        e.preventDefault();
        
        Swal.fire({
            title: 'Are you sure?',
            text: "This page will be refreshed, and You won't be able to revert unsaved changes!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, reset it!',
            reverseButtons: true,
        }).then((result) => {
            if (result.value) {
                location.reload(true);
            }
        })
    });
</script>
@endsection