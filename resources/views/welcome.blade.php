<!DOCTYPE html>
<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
@include('layouts.front.title')
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="" />
<!-- css -->
@include('layouts.front.css')

</head>
<body>
<div id="wrapper" class="home-page">
	<!-- start header -->
	@include('layouts.front.menu')
	<!-- end header -->
	<section id="banner">
	<!-- Slider -->
        @include('layouts.front.slider')
	<!-- end slider -->
	</section>
	@include('layouts.front.mission')
	
    @include('layouts.front.students')
	@include('layouts.front.events')
	@include('layouts.front.facilities')
	@include('layouts.front.testimonials')
	@include('layouts.front.footer')
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
@include('layouts.front.javascript')
</body>

</html>