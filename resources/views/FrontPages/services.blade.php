<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
@include('layouts.front.title')
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="" />
 
@include('layouts.front.css')

</head>
<body>
<div id="wrapper">

	<!-- start header -->
		@include('layouts.front.menu')
    <!-- end header -->
	@include('layouts.front.breadcrumb')
	<section id="content">
		<div class="container content">		
        <!-- Service Blcoks -->
        <div class="row service-v1 margin-bottom-40">
            <p>we take pride in offering a comprehensive range of services that enhance the educational experience of our students and provide support to parents and the school community. Our commitment to excellence extends beyond the classroom, and we are dedicated to providing services that foster a well-rounded education. </p>
            <div class="col-md-4 md-margin-bottom-40">
                <img class="img-responsive" src="{{ asset('Front/img/service1.jpg')}}" alt="">   
                <h2>Academic Excellence</h2>
                <p>Our primary focus is on delivering a high-quality academic program. We follow a rigorous curriculum that aligns with educational standards and promotes critical thinking, problem-solving, and a love for learning.</p>        
            </div>
            <div class="col-md-4">
                <img class="img-responsive" src="{{ asset('Front/img/service2.jpg')}}" alt="">            
                <h2>Experienced Faculty</h2>
                <p>Our dedicated team of experienced educators is passionate about teaching. They foster a positive and engaging learning environment, ensuring that each student reaches their full potential.</p>        
            </div>
            <div class="col-md-4 md-margin-bottom-40">
                <img class="img-responsive" src="{{ asset('Front/img/service3.jpg')}}" alt="">  
                <h2>Counseling & Guidance:</h2>
                <p>We have dedicated counselors who provide emotional and academic support to students. They offer guidance on personal and social development, career counseling, and conflict resolution.</p>        
            </div>
        </div>
        <!-- End Service Blcoks -->

        <hr class="margin-bottom-50">

        <!-- Info Blcoks -->
        {{-- <div class="row">
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-bell-o"></i>
                <div class="info-blocks-in">
                    <h3>Extracurricular Activities</h3>
                    <p>We offer a variety of extracurricular activities, including sports, arts, music, drama, and clubs. These activities allow students to explore their interests, develop new skills, and foster teamwork.</p>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-hdd-o"></i>
                <div class="info-blocks-in">
                    <h3>Special Education Services</h3>
                    <p>Our special education department provides support for students with unique learning needs. We offer individualized education plans (IEPs) and tailored assistance to help every student succeed.</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-lightbulb-o"></i>
                <div class="info-blocks-in">
                    <h3>Library and Learning Resources</h3>
                    <p>Our well-equipped library offers a vast collection of books and digital resources to encourage reading and research. We provide a conducive space for independent learning and exploration.</p>
                </div>
            </div>
        </div> --}}
        <!-- End Info Blcoks -->
        <!-- Info Blcoks -->
        <div class="row">
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-bell-o"></i>
                <div class="info-blocks-in">
                    <h3>Extracurricular Activities</h3>
                    <p>We offer a variety of extracurricular activities, including sports, arts, music, drama, and clubs. These activities allow students to explore their interests, develop new skills, and foster teamwork.</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-lightbulb-o"></i>
                <div class="info-blocks-in">
                    <h3>Special Education Services</h3>
                    <p>Our special education department provides support for students with unique learning needs. We offer individualized education plans (IEPs) and tailored assistance to help every student succeed.</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-hdd-o"></i>
                <div class="info-blocks-in">
                    <h3>Library and Learning Resources</h3>
                    <p>We embrace technology in the classroom to enhance learning. Our students have access to digital resources, computer labs.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-code"></i>
                <div class="info-blocks-in">
                    <h3>Safety and Security</h3>
                    <p>Your child's safety is our utmost concern. We have security personnel, controlled access to the campus, and emergency response procedures in</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-compress"></i>
                <div class="info-blocks-in">
                    <h3>Health and Wellness</h3>
                    <p>We prioritize the health and well-being of our students. Our school nurse ensures that students receive appropriate health care and guidance on maintaining a healthy lifestyle.</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-html5"></i>
                <div class="info-blocks-in">
                    <h3>Technology Integration</h3>
                    <p>We embrace technology in the classroom to enhance learning. Our students have access to digital resources, computer labs, and interactive learning tools.</p>
                </div>
            </div>
        </div>
        <!-- End Info Blcoks -->

        
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