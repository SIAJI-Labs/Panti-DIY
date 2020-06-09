<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ (!empty($wsecond_title) ? $wsecond_title.' | ' : '').$wtitle ?? 'SIAJI' }}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ mix('assets/plugins/fontawesome-free/css/all.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ mix('assets/adminlte/css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('assets/adminlte/css/siaji.css') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
	<body class="sidebar-mini layout-fixed">
		<!-- Site wrapper -->
		<div class="wrapper">
			@include('layouts.partials.cms.navbar')
			@include('layouts.partials.cms.sidebar')

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
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

		<!-- jQuery -->
		<script src="{{ mix('assets/plugins/jquery/jquery.js') }}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{ mix('assets/plugins/bootstrap/js/bootstrap.bundle.js') }}"></script>
		<!-- AdminLTE App -->
		<script src="{{ mix('assets/adminlte/js/app.js') }}"></script>
		<!-- AdminLTE for demo purposes -->
		{{-- <script src="../../js/demo.js"></script> --}}
	</body>
</html>
