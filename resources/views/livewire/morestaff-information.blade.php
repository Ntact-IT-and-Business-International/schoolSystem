<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <style>
        .ml-left{
            margin-left:115px;
        }
    </style>
    <div class="col-sm-12">
        <div class="card mb-4">
            <div class="card-img ui-bg-cover ui-bg-overlay-container">
                <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                @foreach($more_staff_information as $staff)
                <div class="text-center py-4">
                    <img src="{{ asset('storage/Staff_photos/'.$staff->photo)}}" alt class="ui-w-80 ml-left rounded-square mb-3">
                    <h5 class="mb-2 font-weight-bold">Name: {{$staff->staff_last_name}} {{$staff->staff_first_name}} {{$staff->staff_other_names}}</h5>
                    <p class="small opacity-75 font-weight-bold">Email: {{$staff->staff_email}}</p>
                </div>
                @endforeach
                </div>
                <div class="col-sm-4"></div>
                </div>
            </div>
            <div class="card-footer border-0 text-center p-0">
                <div class="row no-gutters row-bordered row-border-light">
                    <a href="#" class="d-flex col flex-column text-dark py-3">
                        <div class="font-weight-bold">Class</div>
                        <div class="text-muted small">{{$staff->level}}</div>
                    </a>
                    <a href="#" class="d-flex col flex-column text-dark py-3">
                        <div class="font-weight-bold">Subject</div>
                        <div class="text-muted small">{{$staff->subject}}</div>
                    </a>
                    <a href="#" class="d-flex col flex-column text-dark py-3">
                        <div class="font-weight-bold">Date of Birth</div>
                        <div class="text-muted small">{{$staff->date_of_birth}}</div>
                    </a>
                </div>
                <div class="row no-gutters row-bordered row-border-light">
                    <a href="#" class="d-flex col flex-column text-dark py-3">
                        <div class="font-weight-bold">Parent NIN</div>
                        <div class="text-muted small">{{$staff->nin}}</div>
                    </a>
                    <a href="#" class="d-flex col flex-column text-dark py-3">
                        <div class="font-weight-bold">Gender</div>
                        <div class="text-muted small">{{$staff->gender}}</div>
                    </a>
                    <a href="#" class="d-flex col flex-column text-dark py-3">
                        <div class="font-weight-bold">Phone Number</div>
                        <div class="text-muted small">{{$staff->phone_number}}</div>
                    </a>
                </div>
                <div class="row no-gutters row-bordered row-border-light">
                    <a href="#" class="d-flex col flex-column text-dark py-3">
                        <div class="font-weight-bold">Qualification</div>
                        <div class="text-muted small">{{$staff->qualification}}</div>
                    </a>
                    <a href="#" class="d-flex col flex-column text-dark py-3">
                        <div class="font-weight-bold">Registration</div>
                        <div class="text-muted small">{{$staff->registration_number}}</div>
                    </a>
                    <a href="#" class="d-flex col flex-column text-dark py-3">
                        <div class="font-weight-bold">Title</div>
                        <div class="text-muted small">{{$staff->title}}</div>
                    </a>
                </div>
                <div class="row no-gutters row-bordered row-border-light">
                    <a href="{{ asset('storage/Staff_document/'.$staff->documents)}}" target="_blank" class="d-flex col flex-column text-dark py-3">
                        <div class="font-weight-bold">Academic</div>
                        <div class="text-mute small" style="color:blue;">View Documents</div>
                    </a>
                    <a href="#" class="d-flex col flex-column text-dark py-3">
                        <div class="font-weight-bold">Salary</div>
                        <div class="text-muted small">{{number_format($staff->salary)}}</div>
                    </a>
                    <a href="#" class="d-flex col flex-column text-dark py-3">
                        <div class="font-weight-bold">Registered On</div>
                        <div class="text-muted small">{{$staff->created_at}}</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
