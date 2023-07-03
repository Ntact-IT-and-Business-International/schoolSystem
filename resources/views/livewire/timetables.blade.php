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
                        <a class="nav-link" data-toggle="tab" href="#tasks-tags">Tags</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tasks-projects">
                        <div class="py-3">
                            <div class="py-2 px-3">
                                <a href="javascript:void(0)" class="text-dark">Website design</a>
                            </div>
                            <div class="py-2 px-3">
                                <a href="javascript:void(0)" class="text-dark">SEO improvement</a>
                            </div>
                            <div class="py-2 px-3">
                                <a href="javascript:void(0)" class="text-dark">example.com redesign</a>
                            </div>
                            <a href="javascript:void(0)" class="d-block text-light small py-2 px-3"><i class="ion ion-md-add"></i>&nbsp; Add project</a>
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
                            <a href="javascript:void(0)" class="d-block text-light small py-2 px-3"><i class="ion ion-md-add"></i>&nbsp; Add tag</a>
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
                                    <th  class="font-weight-bold">6:20-7:30am</th>
                                    <th  class="font-weight-bold">7:30-8:30am</th>
                                    <th   class="font-weight-bold">8:30-9:30am</th>
                                    <th  class="font-weight-bold">9:30-10:30am</th>
                                    <th  class="font-weight-bold">11:00-12:pm</th>
                                    <th  class="font-weight-bold">12:00-1:00pm</th>
                                    <th  class="font-weight-bold">1:00-2:00pm</th>
                                    <th  class="font-weight-bold">2:00-3:00pm</th>
                                    <th  class="font-weight-bold">3:00-4:00pm</th>
                                    <th  class="font-weight-bold">4:00-5:00pm</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($days_of_week as $week)
                                @php
                                $subjects=\DB::table('time_tables')->join('subjects','subjects.id','time_tables.subject_id')->distinct('subjects.subject')->get(['subjects.subject']);
                                @endphp
                                <tr>
                                    <td class="font-weight-bold">{{$week->day}}</td>
                                    @foreach($subjects as $subject)
                                    <td>{{$subject->subject}}</td>
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
