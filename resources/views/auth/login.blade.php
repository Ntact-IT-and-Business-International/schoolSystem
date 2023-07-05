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
            <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="text-center">
                        <p><h2>Enter Your Credentials.</h2></p>
                    </div>
                    <div class="alert alert-success hidden" id="contactSuccess">
                        <x-validation-errors class="mb-4" />

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="alert alert-error hidden" id="contactError">
                        <strong>Error!</strong> There was an error sending your message.
                    </div>
                    <div class="contact-form">
                        <form method="POST" action="{{ route('login') }}" role="form">
                        @csrf
                            <div class="form-group has-feedback">
                                <label for="email">Email*</label>
                                <input type="text" class="form-control" id="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="">
                                <i class="fa fa-envelope form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="subject">Password*</label>
                                <input type="password" class="form-control" id="Password" name="password" required autocomplete="current-password" placeholder="">
                                <i class="fa fa-lock form-control-feedback"></i>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-default">Login Now</button>
                            </div>
                        </form>
                    </div>
                </div><br>
                <div class="col-md-4">
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
