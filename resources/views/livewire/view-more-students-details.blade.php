<div>
    {{-- Be like water. --}}
    <div class="col-lg-12 col-md-12">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-lg-4 col-md-4"></div>
                @foreach($students as $student)
                <div class="col-lg-4 col-md-4  ml-12">
                    <img src="{{ asset('storage/Student_photos/'.$student->photo)}}" style="width:80px;" alt="image" class="mb-2">
                </div>
                @endforeach
                <div class="col-lg-4 col-md-4"></div></div>
                <div class="table-responsive">
                    <table class="table table-sm mb-0 text-center">
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td class="font-weight-bold">Name</td>
                                <td> : {{$student->last_name}} {{$student->first_name}} {{$student->other_names}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Class</td>
                                <td> : {{$student->level}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Date of Birth</td>
                                <td> : {{$student->date_of_birth}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Special Need</td>
                                <td> : {{$student->special_need}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Gender</td>
                                <td> : {{$student->gender}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Fees Payment Code</td>
                                <td> : {{$student->fees_pay_code}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Parents Name</td>
                                <td> : {{$student->parents_name}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Parents Contact</td>
                                <td> : {{$student->contact}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Parents NIN</td>
                                <td> : {{$student->nin}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Location</td>
                                <td> : {{$student->location}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Section</td>
                                <td> : {{$student->section}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Date of Registration</td>
                                <td> : {{$student->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
