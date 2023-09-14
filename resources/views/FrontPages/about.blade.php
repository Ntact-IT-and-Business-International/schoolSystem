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
							    <div class="col-md-6">
									<div class="about-logo">
										<h3>We are awesome <span class="color">TEAM</span></h3>
										<p>we are dedicated to nurturing young minds and providing an environment where every child can thrive academically, socially, and emotionally. Our school's journey has been one of continuous growth and innovation, and we are proud to share our story with you.</p>
										<p><h3>Our Mission</h3></p>
										<p>Our mission is to provide a holistic education that fosters curiosity, creativity, and a lifelong love of learning. We are committed to cultivating responsible, compassionate, and confident individuals who are well-prepared to contribute positively to our global community.</p>
										<p><h3>Our Vision</h3></p>
										<p>We envision a school where children are inspired to explore, discover, and achieve their full potential. Our vision is to create an inclusive and diverse learning environment where every child feels valued and supported in their educational journey.</p>
										<p><h3>Our Achievements</h3></p>
										<p>Over the years, [School Name] Primary School has achieved numerous milestones. Our students consistently excel academically, and they have gone on to succeed in various fields. We take pride in their achievements, which reflect our commitment to excellence.</p>
									</div>
								</div> 
								<div class="col-md-6">
									<div class="about-logo">
										<h3>What sets us  <span class="color">A Part</span></h3>
										<ul>
										<li><strong>Passionate Educators:</strong> Our team of dedicated and experienced educators is at the heart of our school's success. They are not only teachers but also mentors and role models who are committed to the growth and development of each student.</li>
										<li><strong>Holistic Curriculum:</strong> We offer a well-rounded curriculum that goes beyond academics. Our programs include arts, sports, character education, and extracurricular activities to ensure a comprehensive education.</li>
										<li><strong>Safe and Inclusive Environment:</strong> The safety and well-being of our students are paramount. We maintain a secure and nurturing environment where diversity is celebrated, and every child feels welcome.</li>
										<li><strong>Character Development:</strong> Our values-based education instills qualities like respect, empathy, and responsibility in our students, shaping them into responsible and compassionate individuals.</li>
										<li><strong>Innovation in Learning:</strong> We embrace technology and innovative teaching methods to engage students and prepare them for the challenges of the modern world.</li>
										
										</ul>
										<p><h3>Join Us</h3></p>
										<p>We invite you to be a part of the Safeway Junior School community. Whether you're a parent looking for a nurturing and academically enriching environment for your child or an educator seeking a fulfilling teaching career, we welcome you to explore what our school has to offer.we are more than an educational institution; we are a family that supports, inspires, and empowers. Join us on this journey of learning and growth, and together, we can shape a brighter future for our children.</p>
									</div>
								</div> 
							</div>
						</div>
						
						<hr>
						<br>
						
						<div class="row">
							<div class="col-md-4">
								<!-- Heading and para -->
								<div class="block-heading-two">
									<h3><span>Why Choose Us?</span></h3>
								</div>
								<p>Selecting the right primary school for your child is a significant decision, one that sets the foundation for their academic journey and personal growth. At [School Name] Primary School, we understand the importance of this choice, and we're here to explain why we believe we are the perfect choice for your child's educational needs.</p>
								<p>Our approach to education places your child at the center of their learning journey. We recognize and nurture their individual talents and interests.</p>
							</div>
							<div class="col-md-4">
								<div class="block-heading-two">
									<h3><span>Our Solution</span></h3>
								</div>		
								<!-- Accordion starts -->
									<div class="panel-group" id="accordion-alt3">
									<!-- Panel. Use "panel-XXX" class for different colors. Replace "XXX" with color. -->
									<div class="panel">	
										<!-- Panel heading -->
										<div class="panel-heading">
											<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseOne-alt3">
												<i class="fa fa-angle-right"></i> Qn: What is the admission process for enrolling my child in Safeway Junior School?
											</a>
											</h4>
										</div>
										<div id="collapseOne-alt3" class="panel-collapse collapse">
											<!-- Panel body -->
											<div class="panel-body">
											To enroll your child, please visit our school's admissions page on our website, where you'll find detailed information about the application process, requirements, and important dates.
											</div>
										</div>
									</div>
									<div class="panel">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseTwo-alt3">
												<i class="fa fa-angle-right"></i> Qn: Is there a uniform policy at your school?
											</a>
											</h4>
										</div>
										<div id="collapseTwo-alt3" class="panel-collapse collapse">
											<div class="panel-body">
											Yes, we have a school uniform policy in place. Details about the uniform, including where to purchase it, can be found in our school handbook.
											</div>
										</div>
									</div>
									<div class="panel">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseThree-alt3">
												<i class="fa fa-angle-right"></i> Qn: What measures are in place to ensure student safety?
											</a>
											</h4>
										</div>
										<div id="collapseThree-alt3" class="panel-collapse collapse">
											<div class="panel-body">
											We prioritize student safety. Our school has security personnel, controlled access to the campus, and emergency response protocols. We also conduct safety drills regularly.
											</div>
										</div>
									</div>
									{{-- <div class="panel">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseFour-alt3">
												<i class="fa fa-angle-right"></i> Qn: How does the school handle special education and students with unique learning needs?
											</a>
											</h4>
										</div>
										<div id="collapseFour-alt3" class="panel-collapse collapse">
											<div class="panel-body">
											We have a dedicated special education department that provides support and individualized education plans (IEPs) for students with special needs. Our goal is to ensure that all students receive a quality education tailored to their needs.
											</div>
										</div>
									</div> --}}
									</div>
								<!-- Accordion ends -->
								
							</div>
							
							<div class="col-md-4">
								<div class="block-heading-two">
									<h3><span>Our Expertise</span></h3>
								</div>								
								<h6>Students</h6>
									<div class="progress pb-sm">
									<!-- White color (progress-bar-white) -->
									<div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
										<span class="sr-only">40% Complete (success)</span>
									</div>
									</div>
									<h6>Teaching Staff</h6>
									<div class="progress pb-sm">
									<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
										<span class="sr-only">40% Complete (success)</span>
									</div>
									</div>
									<h6>Non Teaching Staff</h6>
									<div class="progress pb-sm">
									<div class="progress-bar progress-bar-lblue" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
										<span class="sr-only">40% Complete (success)</span>
									</div>
									</div>
									<h6>PLE Results Last Year</h6>
									<div class="progress pb-sm">
									<div class="progress-bar progress-bar-yellow" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
										<span class="sr-only">40% Complete (success)</span>
									</div>
									</div>
							</div>
							
						</div>
						<br>
						<!-- Our Team starts -->
				
						<!-- Heading -->
						<div class="block-heading-six">
							<h4 class="bg-color">Our Team</h4>
						</div>
						<br>
						
						<!-- Our team starts -->
						
						<div class="team-six">
							<div class="row">
								<div class="col-md-3 col-sm-6">
									<!-- Team Member -->
									<div class="team-member">
										<!-- Image -->
										<img class="img-responsive" src="{{ asset('Front/img/team1.jpg')}}" alt="">
										<!-- Name -->
										<h4>Johne Doe</h4>
										<span class="deg">Director</span> 
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<!-- Team Member -->
									<div class="team-member">
										<!-- Image -->
										<img class="img-responsive" src="{{ asset('Front/img/team2.jpg')}}" alt="">
										<!-- Name -->
										<h4>Jennifer</h4>
										<span class="deg">Headteacher</span> 
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<!-- Team Member -->
									<div class="team-member">
										<!-- Image -->
										<img class="img-responsive" src="{{ asset('Front/img/team3.jpg')}}" alt="">
										<!-- Name -->
										<h4>Christean</h4>
										<span class="deg">Deputy Academics</span> 
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<!-- Team Member -->
									<div class="team-member">
										<!-- Image -->
										<img class="img-responsive" src="{{ asset('Front/img/team4.jpg')}}" alt="">
										<!-- Name -->
										<h4>Kerinele rase</h4>
										<span class="deg">Deputy Adminstration</span> 
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