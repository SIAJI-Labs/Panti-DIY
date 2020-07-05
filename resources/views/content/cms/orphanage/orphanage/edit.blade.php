@extends('layouts.cms', [
    'wsecond_title' => 'Orphanage: Edit',
    'sidebar_menu' => 'orphanage',
    'sidebar_submenu' => 'list',
    'wheader' => [
        'header_title' => 'Orphanage: Edit',
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
                'title' => 'Edit',
                'is_active' => true,
                'url' => null
            ]
        ]
    ]
])

@section('content')
<form class="card card-primary card-outline" action="{{ route('cms.orphanage.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card-header">
        <h3 class="card-title">Edit Orphanage Data</h3>

        <div class="card-tools">
            <a href="{{ route('cms.orphanage.index') }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" title="Back to Orphanage List">
                <i class="far fa-arrow-alt-circle-left"></i> Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" id="input-name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" onkeyup="generateSlug('name', 'slug');" value="{{ $data->name }}">
            @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" id="input-slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" value="{{ $data->slug }}">
            @error('slug')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <div class="row preview-container">
                <div class="col-12 col-lg-3">
                    <div class="img-preview mb-2">
                        <button type="button" class="btn btn-sm btn-danger d-block mb-2 mx-auto btn-preview_remove" onclick="removeCustomPreview($(this), '{{ !empty($data->logo) ? asset('images/orphanage/'.$data->logo) : '' }}')" disabled>Reset Preview</button>
                        <img class="img-responsive" width="100%;" style="padding:.25rem;background:#eee;display:block;" @if(!empty($data->logo)) src="{{ asset('images/orphanage/'.$data->logo) }}" @endif>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" name="logo" id="input-logo" onchange="generateCustomPreview($(this))">
                        <label class="custom-file-label" for="input-logo">Choose file</label>
                        @error('logo')
                        <div class='invalid-feedback'>{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Suggestion: Use a picture PNG extension / Leave it empty to keep old data / Accepted Extension : jpg, jpeg, and png / Max File Size is 500kb.</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="ckeditor form-control @error('description') is-invalid @enderror" name="description">{!! $data->description !!}</textarea>
            @error('description')
            <div class='invalid-feedback'>{{ $message }}</div>
            @enderror
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer text-right">
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-danger">Reset</button>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
    </div>
    <!-- /.card-footer-->
</form>
@endsection

@section('js_plugins')
{{-- CKEditor --}}
<script src="{{ mix('assets/plugins/ckeditor/build/ckeditor.js') }}"></script>
<script src="{{ mix('assets/plugins/bs-custom-file-input/bs-custom-file-input.js') }}"></script>
@endsection

@section('js_inline')
<script>
    const watchdog = new CKSource.Watchdog();
    window.watchdog = watchdog;
    watchdog.setCreator( ( element, config ) => {
        return CKSource.Editor
            .create( element, config )
            .then( editor => {
                return editor;
            });
    });
    watchdog.setDestructor( editor => {
        return editor.destroy();
    });
    watchdog.on( 'error', handleError );
    watchdog.create( document.querySelector( '.ckeditor' ), {
        placeholder: 'Type the Orphanage Description here!',
        height: 500,	
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'underline',
                'strikethrough',
                'subscript',
                'superscript',
                '|',
                'undo',
                'redo',
                'specialCharacters',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                'fontBackgroundColor',
                'fontColor',
                'highlight',
                'fontFamily',
                'fontSize',
                '|',
                'alignment',
                'indent',
                'outdent',
                '|',
                'blockQuote',
                'horizontalLine',
                'code',
                'codeBlock',
                '|',
                'insertTable',
                'mediaEmbed',
                'removeFormat'
            ]
        },
        language: 'en',
        image: {
            toolbar: [
                'imageTextAlternative',
                'imageStyle:full',
                'imageStyle:side'
            ]
        },
        licenseKey: '',
    })
    .catch( handleError );
		
    function handleError( error ) {
        console.error( 'Oops, something gone wrong!' );
        console.error( 'Please, report the following error in the https://github.com/ckeditor/ckeditor5 with the build id and the error stack trace:' );
        console.warn( 'Build id: 8hx85als4qzm-4akfeg29g53u' );
        console.error( error );
    }

    // Generate Slug (Replace space with dash/-)
    function generateSlug(source, target){
        var title = $(`#input-${source}`).val();
        var slug = title
            .toLowerCase()
            .replace(/[^\w ]+/g,'')
            .replace(/ +/g,'-');
        if(slug.slice(-1) == "-"){
            slug = slug.slice(0, -1);
        }
        
        $(`#input-${target}`).val(slug);
    }
</script>
@endsection