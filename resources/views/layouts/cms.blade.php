<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ (!empty($wsecond_title) ? $wsecond_title.' | ' : '').($wtitle ?? 'SIAJI') }}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ mix('assets/plugins/fontawesome-free/css/all.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ mix('assets/adminlte/css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('assets/adminlte/css/siaji.css') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        @yield('css_plugins')
		@yield('css_inline')
    </head>
	<body class="sidebar-mini layout-fixed">
		<!-- Site wrapper -->
		<div class="wrapper">
			@include('layouts.partials.cms.navbar')
			@include('layouts.partials.cms.sidebar')

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
                <!-- Ajax Alert -->
                <div id="ajax-alert">
                @if(!(Auth::user()->is_verified))
                    <div class="alert alert-warning fade show mb-0" role="alert" style="border:unset;border-radius:0;">
                        <span>Please check your email to verify, or <a href="javascript:void(0)" onclick="resend_link()" class="alert-link btn btn-sm btn-secondary text-white">Click Here</a> to resend verification mail.</span>
                    </div>
                @endif
                    <div class="alert alert-progress alert-info fade show mb-0" role="alert" id="progress-alert" style="display:none;border:unset;border-radius:0;">
                        <div class="d-flex align-items-center">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="ml-2">Please wait, process is running...</span>
                        </div>
                    </div>
                </div>

				@if(isset($wheader) && isset($wheader))
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>{{ $wheader['header_title'] }}</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    @foreach($wheader['header_breadcrumb'] as $br)
                                    <li class="breadcrumb-item {{ $br['is_active'] ? 'active' : '' }}">
                                        @if($br['is_active'])
                                        {{ $br['title'] }}
                                        @else
                                        <a href="{{ $br['url'] }}">{{ $br['title'] }}</a>
                                        @endif
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
				@endif
				
				@if(Session::get('message'))
                <!-- Content Message (Page header) -->
                <div class="container-fluid">
                    <section class="px-2">
                        <div class="alert alert-{{ Session::get('status') ?? 'info' }} alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5>
                                @if(Session::get('message_icon'))
                                <i class="icon fas fa-{{ Session::get('message_icon') ?? 'info' }}"></i>
                                @endif {{ Session::get('status') ? ucwords(Session::get('status')) : 'Info' }}!</h5>
                            {{ Session::get('message') }}
                        </div>
                    </section>
                </div>
                @endif

				<!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </section>
                <!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			@include('layouts.partials.cms.footer')
		</div>
		<!-- ./wrapper -->

        @yield('content_modal')
        
        {{-- Logout Form --}}
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

		<!-- AdminLTE App -->
        <script src="{{ mix('assets/adminlte/js/app.js') }}"></script>
        <script src="{{ mix('assets/adminlte/js/siaji.js') }}"></script>
        
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: () => {
                    // show loading dialog // works
                    $("#progress-alert").slideDown();
                },
                complete: (xhr, stat) => {
                    // hide dialog // works
                    $("#progress-alert").slideUp();
                }
            });
            
            function resend_link(){
                console.log("Resend Link is running...");
            }
        </script>
        @yield('js_plugins')
		@yield('js_inline')
	</body>
</html>
