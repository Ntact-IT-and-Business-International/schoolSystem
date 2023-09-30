<header>
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{-- <a class="navbar-brand" href="/" style="color:#fff;"><img src="{{ asset('Front/img/logo.png')}}" alt="logo"/> School Management System</a> --}}
                <a class="navbar-brand" href="/" style="color:#fff; font-size:18px; margin-top:25px;"> School Management System</a>
            </div>
            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li @if(\Request::route()->getName() == "Home") class="active" @else class="" @endif><a href="/">Home</a></li> 
                    <li @if(\Request::route()->getName() == "About Us") class="active" @else class="" @endif><a href="{{URL::signedRoute('About Us')}}">About Us</a></li>
                    <li @if(\Request::route()->getName() == "Services") class="active" @else class="" @endif><a href="{{URL::signedRoute('Services')}}">Services</a></li>
                    <li @if(\Request::route()->getName() == "Our Portfolio") class="active" @else class="" @endif><a href="{{URL::signedRoute('Our Portfolio')}}">Portfolio</a></li>
                    <li @if(\Request::route()->getName() == "Our Admission") class="active" @else class="" @endif><a href="{{URL::signedRoute('Our Admission')}}">Admissions</a></li>
                    <li @if(\Request::route()->getName() == "Our PLE Results") class="active" @else class="" @endif><a href="{{URL::signedRoute('Our PLE Results')}}">PLE Results</a></li>
                    <li @if(\Request::route()->getName() == "Our Contact") class="active" @else class="" @endif><a href="{{URL::signedRoute('Our Contact')}}">Contact</a></li>
                    <li @if(\Request::route()->getName() == "Our Jobs") class="active" @else class="" @endif><a href="{{URL::signedRoute('Our Jobs')}}">Jobs</a></li>
                    <li @if(\Request::route()->getName() == "Login") class="active" @else class="" @endif><a href="/login">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>