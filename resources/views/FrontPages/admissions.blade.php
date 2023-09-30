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
					
					<div class="about">
					
						<div class="row"> 
							<div class="col-md-12">
							    <div class="col-md-12">
									<div class="about-logo">
										<h3>Admission <span class="color">Procedure</span></h3>
										<p>The children are given both oral and written interviews and the results help in the assessment and placement of the child. After the interview the children are placed in different classes according to their abilities. Admissions are carried out on specific dates during the term. The dates are communicated to the parents and public through different communication channels that is notice board, circulars, SMS, meetings among others.</p>
                                        <p><h3>Oral/Written interview;</h3></p>
                                        <p>The interview helps to assess the performance and ability of the child. The children are given both oral and written interviews and the results help in the assessment and placement of the child. After the interview the children are placed in different classes according to their abilities. Admissions are carried out on specific dates during the term. The dates are communicated to the parents and public through different communication channels that is notice board, circulars, SMS, meetings among others.</p>
                                        <p><h3>Upon admission, a child/parent is expected to</h3></p>
                                        <ul>
                                            <li>Report to school within two weeks after the official date of opening the school.</li>
                                            <li>Pay school fees and admission fee.</li>
                                            <li>Pay school fees within two weeks after registration.</li>
                                            <li>Make payment in the bank either with a bank slip or bank draft</li>
                                            <li>Buy school uniform from the school. The uniforms include;</li>
                                            <li>Boys shirt and short</li>
                                            <li>Girls blouse and pinafore dress</li>
                                            <li>P.E uniform T. Shirt and P.E Short for boys</li>
                                            <li>P.E uniform T. shirt and P.E skirt for girls</li>
                                            <li>A pair of socks</li>
                                            <li>Belt for boys</li>
                                            <li>Sweater</li>
                                            <li>Tie</li>
                                            <p><h3>Our expectations from parents</h3></p>
                                            <ul>
                                                <li>Attend all meetings at school.</li>
                                                <li>Drop and collect the child from school in time.</li>
                                                <li>Fulfill the financial obligation in terms of school payments</li>
                                                <li>Ensure that you are monitoring the performance and welfare of your child both at school and at home.</li>
                                            </ul>
                                            <p>Apply Online!</p>
                                            <ul>
                                                <li>Download <a href="{{ asset('public/Front/produce_local_nd_english_names.pdf')}}" download>Application Form</a>,</li>
                                                <li>Fill the form</li>
                                                <li>Email the filled form to <a href="mailto:School Management System@gmail.com">schoolmanagementschool@gmail.com</a></li>
                                                <li class="btn-sm btn-success btn"><a href="{{ asset('public/Front/produce_local_nd_english_names.pdf')}}" download style="color:#fff">Download Application Now</li>
                                            </ul>
                                        </ul>
									</div>
								</div> 
							</div>
						</div>
						
						<!-- Our team ends -->
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