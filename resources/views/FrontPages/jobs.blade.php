<!DOCTYPE html>
<html lang="en">

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
<div id="wrapper">
	<!-- start header -->
		@include('layouts.front.menu')
    <!-- end header -->
	@include('layouts.front.breadcrumb')
	<section id="content">
	<div class="container">	 
		<!-- end divider -->
		<div class="row">
			<div class="col-lg-12">
				<h4>Our best plans</h4>
			</div>
			<div class="col-lg-3">
				<div class="pricing-box-item">
					<div class="pricing-heading">
						<h3><strong>Basic</strong></h3>
					</div>
					<div class="pricing-terms">
						<h6>&#36;15.00 / Year</h6>
					</div>
					<div class="pricing-container">
						<ul>
							<li><i class="icon-ok"></i> Responsive Design</li>
							<li><i class="icon-ok"></i> Bootstrap Design</li>
							<li><i class="icon-ok"></i> Unlimited Support</li>
							<li><i class="icon-ok"></i> Free Trial version</li>
							<li><i class="icon-ok"></i> HTML5 CSS3 jQuery</li>
						</ul>
					</div>
					<div class="pricing-action">
						<a href="#" class="btn btn-medium"><i class="icon-bolt"></i> Get Now</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="pricing-box-item">
					<div class="pricing-heading">
						<h3><strong>Standard</strong></h3>
					</div>
					<div class="pricing-terms">
						<h6>&#36;20.00 / Year</h6>
					</div>
					<div class="pricing-container">
						<ul>
							<li><i class="icon-ok"></i> Responsive Design</li>
							<li><i class="icon-ok"></i> Bootstrap Design</li>
							<li><i class="icon-ok"></i> Unlimited Support</li>
							<li><i class="icon-ok"></i> Free Trial version</li>
							<li><i class="icon-ok"></i> HTML5 CSS3 jQuery</li>
						</ul>
					</div>
					<div class="pricing-action">
						<a href="#" class="btn btn-medium"><i class="icon-bolt"></i> Get Now</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="pricing-box-item activeItem">
					<div class="pricing-heading">
						<h3><strong>Advanced</strong></h3>
					</div>
					<div class="pricing-terms">
						<h6>&#36;15.00 / Year</h6>
					</div>
					<div class="pricing-container">
						<ul>
							<li><i class="icon-ok"></i> Responsive Design</li>
							<li><i class="icon-ok"></i> Bootstrap Design</li>
							<li><i class="icon-ok"></i> Unlimited Support</li>
							<li><i class="icon-ok"></i> Free Trial version</li>
							<li><i class="icon-ok"></i> HTML5 CSS3 jQuery</li>
						</ul>
					</div>
					<div class="pricing-action">
						<a href="#" class="btn btn-medium"><i class="icon-bolt"></i> Get Now</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="pricing-box-item">
					<div class="pricing-heading">
						<h3><strong>Mighty</strong></h3>
					</div>
					<div class="pricing-terms">
						<h6>&#36;15.00 / Year</h6>
					</div>
					<div class="pricing-container">
						<ul>
							<li><i class="icon-ok"></i> Responsive Design</li>
							<li><i class="icon-ok"></i> Bootstrap Design</li>
							<li><i class="icon-ok"></i> Unlimited Support</li>
							<li><i class="icon-ok"></i> Free Trial version</li>
							<li><i class="icon-ok"></i> HTML5 CSS3 jQuery</li>
						</ul>
					</div>
					<div class="pricing-action">
						<a href="#" class="btn btn-medium"><i class="icon-bolt"></i> Get Now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>
	@include('layouts.front.footer')
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
@include('layouts.front.javascript')
</body>

</html>