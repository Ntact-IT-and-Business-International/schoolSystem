<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-3">
            <div class="ui-bordered mb-4">
                <div class="d-flex align-items-center w-100 bg-lighter font-weight-bold py-2 px-3">
                    <i class="ion ion-ios-filing ui-w-20 mr-1"></i>
                    <a href="javascript:void(0)" class="d-block text-dark">Today</a>
                </div>
                <div class="d-flex align-items-center w-100 py-2 px-3">
                    <i class="ion ion-md-calendar ui-w-20 mr-1"></i>
                    <a href="javascript:void(0)" class="d-block text-dark">This Week</a>
                </div>
                <div class="d-flex align-items-center w-100 py-2 px-3">
                    <i class="ion ion-ios-calendar ui-w-20 mr-1"></i>
                    <a href="javascript:void(0)" class="d-block text-dark">This Term</a>
                </div>
                <ul class="nav nav-sm nav-tabs tabs-alt nav-justified mt-3">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tasks-projects">Teacher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tasks-tags">Days</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tasks-projects">
                        <div class="py-3">
                            <div class="py-2 px-3">
                                <a href="javascript:void(0)" class="text-dark">Okello Julius</a>
                            </div>
                            <div class="py-2 px-3">
                                <a href="javascript:void(0)" class="text-dark">Ociba James</a>
                            </div>
                            <div class="py-2 px-3">
                                <a href="javascript:void(0)" class="text-dark">Odongo Robert</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tasks-tags">
                        <div class="py-3">
                            <div class="py-2 px-3">
                                <a href="javascript:void(0)" class="text-dark"><span class="badge badge-dot badge-success"></span> &nbsp; Clients</a>
                            </div>
                            <div class="py-2 px-3">
                                <a href="javascript:void(0)" class="text-dark"><span class="badge badge-dot badge-danger"></span> &nbsp; Important</a>
                            </div>
                            <div class="py-2 px-3">
                                <a href="javascript:void(0)" class="text-dark"><span class="badge badge-dot badge-info"></span> &nbsp; Social</a>
                            </div>
                            <div class="py-2 px-3">
                                <a href="javascript:void(0)" class="text-dark"><span class="badge badge-dot badge-warning"></span> &nbsp; Other</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-header py-3">
                    <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-time-table')"><i class="feather icon-plus"></i> Add TimeTable (s)</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th  class="font-weight-bold">DAYS|TIME</th>
                                    @foreach($hours as $time)
                                    <th  class="font-weight-bold">{{$time->starting_time}}-{{$time->end_time}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($days_of_week as $week)
                                @php
                                $subjects=\DB::table('time_tables')->join('subjects','subjects.id','time_tables.subject_id')->distinct('subjects.subject')->get(['subjects.subject']);
                                $teachers =\DB::table('time_tables')->join('staffs','staffs.id','time_tables.staff_id')->get(['staffs.staff_last_name','staffs.staff_first_name','staffs.staff_other_names']);
                                @endphp
                                <tr>
                                    <td class="font-weight-bold">{{$week->day}}</td>
                                    @foreach($subjects as $subject)
                                    @foreach($teachers as $teacher)
                                    <td>{{$subject->subject}} {{$teacher->staff_last_name}}</td>
                                    @endforeach
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Event modal -->
    </div>
</div>
