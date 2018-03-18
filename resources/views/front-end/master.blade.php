<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>BookShop | @yield('title')</title>
<link href="{{asset('front-end/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
<script src="{{asset('front-end/js/jquery-1.11.0.min.js')}}"></script>
<!--Custom-Theme-files-->
<!--theme-style-->
<link href="{{asset('front-end/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--start-menu-->
<script src="{{asset('front-end/js/simplemin.js')}}"> </script>
<link href="{{asset('front-end/css/memenu.css')}}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{asset('front-end/js/memenu.js')}}"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
<!--dropdown-->
<script src="{{asset('front-end/js/jquery.easydropdown.js')}}"></script>			
<script src="{{asset('front-end/js/myjs.js')}}"></script>
</head>
<body> 
	<!--top-header-->
	@include('front-end.header.header')
	<!--top-header-->
	<!--start-logo-->
	@include('front-end.header.logo')
	<!--start-logo-->
	<!--bottom-header-->
	@include('front-end.header.menu')
	<!--bottom-header-->

	<!--Slider-Starts-Here-->
				<script src="{{asset('front-end/js/responsiveslides.min.js')}}"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<!--End-slider-script-->
	<!-- Content -->
	@yield('content')
	<!-- End Content -->
	<!--information-starts-->
	@include('front-end.footer.infomation')
	<!--information-end-->
	<!--footer-starts-->
	@include('front-end.footer.footer')
	<!--footer-end-->	
</body>
</html>