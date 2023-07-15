<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="card-header with-elements">
        <h6 class="card-header-title mb-0">
                <div class="form-group col-sm-6">
                    <select class="custom-select col-sm-6" wire:model='perPage'>
                        <option>10</option>
                        <option>20</option>
                        <option>30</option>
                        <option>40</option>
                        <option>50</option>
                        <option>60</option>
                    </select>
                </div>
        </h6>
        <div class="card-header-elements ml-auto">
            <div class="form-group row">
                <div class="col-sm-8">
                    <input wire:model.debounce.300ms="search" class="form-control" type="text" placeholder="Search" aria-label="Search">
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col" wire:click="sortBy('staffs.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'staffs.id'])
                </th>
                <th scope="col" wire:click="sortBy('staff_last_name')" style="cursor: pointer;"> Name
                    @include('partials._sort-icon',['field'=>'staff_last_name'])
                </th>
                <th scope="col" wire:click="sortBy('date_of_birth')" style="cursor: pointer;"> Class
                    @include('partials._sort-icon',['field'=>'date_of_birth'])
                </th>
                <th scope="col" wire:click="sortBy('subject')" style="cursor: pointer;"> Subject
                    @include('partials._sort-icon',['field'=>'subject'])
                </th>
                <th scope="col" wire:click="sortBy('phone_number')" style="cursor: pointer;"> Phone Number
                    @include('partials._sort-icon',['field'=>'phone_number'])
                </th>
                <th scope="col" wire:click="sortBy('registration_number')" style="cursor: pointer;"> Reg No
                    @include('partials._sort-icon',['field'=>'registration_number'])
                </th>
                <th scope="col" wire:click="sortBy('qualification')" style="cursor: pointer;"> Documents
                    @include('partials._sort-icon',['field'=>'qualification'])
                </th>
                <th scope="col" wire:click="sortBy('salary')" style="cursor: pointer;"> Salary
                    @include('partials._sort-icon',['field'=>'salary'])
                </th>
                <th scope="col" wire:click="sortBy('photo')" style="cursor: pointer;"> Photo
                    @include('partials._sort-icon',['field'=>'photo'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($teaching_staffs as $i=>$staff)
            <tr>
                <th scope="row">{{$teaching_staffs->firstitem() + $i}}</th>
                <td>{{$staff->staff_last_name}} {{$staff->staff_first_name}} {{$staff->staff_other_names}}</td>
                <td>{{$staff->level}}</td>
                <td>{{$staff->subject}}</td>
                <td>{{$staff->phone_number}}</td>
                <td>{{$staff->registration_number}}</td>
                <td style="color:blue;"><a href="{{ asset('storage/Staff_document/'.$staff->documents)}}" style="width:60px; height:40px;" target="_blank">Documents</a></td>
                <td>{{ number_format($staff->salary)}}</td>
                <td><img src="{{ asset('storage/Staff_photos/'.$staff->photo)}}" style="width:60px; height:40px;"></td>
                <td>
                    <div class="btn-group" id="hover-dropdown-demo">
                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" data-trigger="hover">Select</button>
                            <div class="dropdown-menu">
                                <a href="{{URL::signedRoute('MoreStaffInfo', ['staff_id' => $staff->id])}}" class="btn btn-success btn-sm dropdown-item btn-square mb-1">More Info</a>
                                <a href="{{URL::signedRoute('EditStaff', ['staff_id' => $staff->id])}}" class="btn btn-warning btn-sm dropdown-item btn-square mb-1">Edit</a>
                                <button wire:click="deletePupilsStaff({{ $staff->id }})" class="btn btn-danger btn-sm dropdown-item mb-1">Delete</button>
                            </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$teaching_staffs->firstItem()}} to {{$teaching_staffs->lastItem()}} out of {{$teaching_staffs->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$teaching_staffs->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-staff')"><i class="feather icon-plus"></i> Add Staff(s)</button>
        </div>
    </div>
</div>
