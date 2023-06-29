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
            <div class="row">
                <div class="col-md-6">
                    <p>@include('layouts.message')</p>
                        
                    <div class="contact-form">
                        <form action="/send-message" method="get" role="form">
                            <div class="form-group has-feedback">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control" id="names" name="names" placeholder="">
                                <i class="fa fa-user form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="Contact">Contact*</label>
                                <input type="text" class="form-control" id="Contact" name="contact" placeholder="">
                                <i class="fa fa-envelope form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="subject">Subject*</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="">
                                <i class="fa fa-navicon form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="message">Message*</label>
                                <textarea class="form-control" rows="6" id="message" name="message" placeholder=""></textarea>
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                            <input type="submit" value="Submit" class="btn btn-default">
                        </form>
                    </div>
                </div><br>
                <div class="col-md-6">
                    <div class="row">
                        <div class="info-blocks">
                            <i class="icon-info-blocks fa fa-map-marker"></i>
                            <div class="info-blocks-in">
                                <h3>Address</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                            </div>
                        </div>
                        <div class="info-blocks">
                            <i class="icon-info-blocks fa fa-phone"></i>
                            <div class="info-blocks-in">
                                <h3>Phone Numbers</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                            </div>
                        </div>
                        <div class="info-blocks">
                            <i class="icon-info-blocks fa fa-envelope"></i>
                            <div class="info-blocks-in">
                                <h3>Email</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                            </div>
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