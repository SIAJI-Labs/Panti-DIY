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

@section('css_plugins')
{{-- Select2 --}}
<link href="{{ mix('assets/plugins/select2/css/select2.css') }}" rel="stylesheet">
<link href="{{ mix('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet">
@endsection

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

        <div class="form-row">
            <div class="form-group col-12 col-lg-6">
                <label>Province</label>

                <select class="form-control @error('province_id') is-invalid @enderror" id="input-province_id" name="province_id">
                    @if (!empty($data->province_id))
                    <option value="{{ $data->province_id }}">{{ $data->province->name }}</option>
                    @endif
                </select>
                @error('province_id')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-lg-6">
                <label>Regency</label>

                <select class="form-control @error('regency_id') is-invalid @enderror" id="input-regency_id" name="regency_id" @if(empty($data->province_id)) disabled @endif>
                    @if (!empty($data->regency_id))
                    <option value="{{ $data->regency_id }}">{{ $data->regency->name }}</option>
                    @endif
                </select>
                @error('regency_id')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-lg-6">
                <label>District</label>

                <select class="form-control @error('district_id') is-invalid @enderror" id="input-district_id" name="district_id" @if(empty($data->regency_id)) disabled @endif>
                    @if (!empty($data->district_id))
                    <option value="{{ $data->district_id }}">{{ $data->district->name }}</option>
                    @endif
                </select>
                @error('district_id')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12 col-lg-6">
                <label>Village</label>

                <select class="form-control @error('village_id') is-invalid @enderror" id="input-village_id" name="village_id" @if(empty($data->district_id)) disabled @endif>
                    @if (!empty($data->village_id))
                    <option value="{{ $data->village_id }}">{{ $data->village->name }}</option>
                    @endif
                </select>
                @error('village_id')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
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
{{-- Select2 --}}
<script src="{{ mix('assets/plugins/select2/js/select2.js') }}"></script>
@endsection

@section('js_inline')
<script>
    $(document).ready(() => {
        let select2_query = {};
        // Province Select2
        $("#input-province_id").select2({
            placeholder: 'Search Province',
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
                url: "{{ route('json.select2.province.all') }}",
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
        $("#input-province_id").change((e) => {
            console.log("Province is being changed");

            let province = $(e.target).val();
            let select_data = $(e.target).select2('data');

            if(province != null){
                $("#input-old_province_text").val(select_data[0]['text']);
                $("#input-old_province_id").val(select_data[0]['id']);

                $("#input-regency_id").attr('disabled', false);
            } else {
                $("#input-old_province_text").val('');
                $("#input-old_province_id").val('');

                $("#input-regency_id option").remove();
                $("#input-regency_id").attr('disabled', true).trigger('change');
            }
        });
        // Regency Select2
        $("#input-regency_id").select2({
            placeholder: 'Search Regency',
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
                url: "{{ route('json.select2.regency.all') }}",
                delay: 250,
                data: function (params) {
                    var query = {
                        search: params.term,
                        page: params.page || 1,
                        province_id: $("#input-province_id").val()
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
        $("#input-regency_id").change((e) => {
            let regency = $(e.target).val();
            let select_data = $(e.target).select2('data');

            if(regency != null){
                $("#input-old_regency_text").val(select_data[0]['text']);
                $("#input-old_regency_id").val(select_data[0]['id']);

                $("#input-district_id").attr('disabled', false);
                $("#input-district_id option").remove().trigger('change');
            } else {
                $("#input-old_regency_text").val('');
                $("#input-old_regency_id").val('');

                $("#input-district_id option").remove();
                $("#input-district_id").attr('disabled', true).trigger('change');
            }
        });
        // District Select2
        $("#input-district_id").select2({
            placeholder: 'Search District',
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
                url: "{{ route('json.select2.district.all') }}",
                delay: 250,
                data: function (params) {
                    var query = {
                        search: params.term,
                        page: params.page || 1,
                        regency_id: $("#input-regency_id").val()
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
        $("#input-district_id").change((e) => {
            let district = $(e.target).val();
            let select_data = $(e.target).select2('data');

            if(district != null){
                $("#input-old_district_text").val(select_data[0]['text']);
                $("#input-old_district_id").val(select_data[0]['id']);

                $("#input-village_id").attr('disabled', false);
                $("#input-village_id option").remove().trigger('change');
            } else {
                $("#input-old_district_text").val('');
                $("#input-old_district_id").val('');

                $("#input-village_id option").remove();
                $("#input-village_id").attr('disabled', true).trigger('change');
            }
        });
        // Village Select2
        $("#input-village_id").select2({
            placeholder: 'Search Village',
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
                url: "{{ route('json.select2.village.all') }}",
                delay: 250,
                data: function (params) {
                    var query = {
                        search: params.term,
                        page: params.page || 1,
                        district_id: $("#input-district_id").val()
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
        $("#input-village_id").change((e) => {
            let village = $(e.target).val();
            let select_data = $(e.target).select2('data');

            if(village != null){
                $("#input-old_village_text").val(select_data[0]['text']);
                $("#input-old_village_id").val(select_data[0]['id']);
            } else {
                $("#input-old_village_text").val('');
                $("#input-old_village_id").val('');
            }
        });
    }); 

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