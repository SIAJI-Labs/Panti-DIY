@extends('layouts.cms', [
    'wsecond_title' => 'Post: Create',
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
                'is_active' => false,
                'url' => route('cms.post.index')
            ], [
                'title' => 'Create',
                'is_active' => true,
                'url' => null
            ]
        ]
    ]
])

@section('content')
<form class="card" action="{{ route('cms.post.store') }}" method="POST">
    @csrf

    <div class="card-header">
        <h3 class="card-title">Create new Post</h3>

        <div class="card-tools">
            <a href="{{ route('cms.post.index') }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" title="Back to Post List">
                <i class="far fa-arrow-alt-circle-left"></i> Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" id="input-title" class="form-control @error('title') is-invalid @enderror" placeholder="Post Title">
            @error('title')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" id="input-slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Post Slug">
            @error('slug')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <div class="ckeditor"></div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer text-right">
        <div class="btn-group float-right">
            <button type="button" id="button-reset" class="btn btn-sm btn-danger">Reset</button>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
    </div>
    <!-- /.card-footer-->
</form>
@endsection

@section('js_plugins')
<script src="{{ mix('assets/plugins/ckeditor/build/ckeditor.js') }}"></script>
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
</script>
@endsection