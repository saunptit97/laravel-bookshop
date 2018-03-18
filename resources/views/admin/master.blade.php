<!DOCTYPE html>
<html>
<head>
	<title>Admin | @yield('title') </title>
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style1.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/font-awesome.min.css') }}">
	<script src="{{asset('front-end/js/myjs.js')}}"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				@include('admin.header.menu')
			</div>
			<div class="col-md-9 content">
				@include('admin.header.header')
				@yield('content')
				@include('admin.footer.footer')
			</div>
		</div>
	</div>
</body>
</html>