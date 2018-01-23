<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title', 'Default') | Panel de Administración </title>
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }} ">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap-grid.css') }} ">
</head>
<body style="background-color: #BCDFFF;">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1 col-lg-1 col-xl-1">
				@yield('contentLeft')
			</div>	

			<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
				@include('admin.template.partials.navBar')

				@yield('titlePage')
				<hr>
				@yield('content')
			</div>

			<div class="col-md-1 col-lg-1 col-xl-1">
				@yield('contentRight')
			</div>			
		</div>
	</div>

	<script src="{{ asset('plugins/jquery/js/jquery-3.3.1.js') }}" type="text/javascript"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}" type="text/javascript"></script>
</body>
</html>