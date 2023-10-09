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
                    <th scope="col" wire:click="sortBy('attendances.id')" style="cursor: pointer;">#
                        @include('partials._sort-icon',['field'=>'attendances.id'])
                    </th>
                    <th scope="col" wire:click="sortBy('name')" style="cursor: pointer;"> Name
                        @include('partials._sort-icon',['field'=>'name'])
                    </th>
                    <th scope="col" wire:click="sortBy('boys')" style="cursor: pointer;"> Boys
                        @include('partials._sort-icon',['field'=>'boys'])
                    </th>
                    <th scope="col" wire:click="sortBy('girls')" style="cursor: pointer;"> Girls
                        @include('partials._sort-icon',['field'=>'girls'])
                    </th>
                    <th scope="col" wire:click="sortBy('girls')" style="cursor: pointer;"> Total
                        @include('partials._sort-icon',['field'=>'girls'])
                    </th>
                    <th scope="col" wire:click="sortBy('term')" style="cursor: pointer;"> Term
                        @include('partials._sort-icon',['field'=>'quantity'])
                    </th>
                    <th scope="col" wire:click="sortBy('date')" style="cursor: pointer;"> Date
                        @include('partials._sort-icon',['field'=>'date'])
                    </th>
                    <th scope="col" wire:click="sortBy('name')" style="cursor: pointer;"> Teacher On Duty
                        @include('partials._sort-icon',['field'=>'name'])
                    </th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($attendances as $i=>$attendance)
                <tr>
                    <th scope="row">{{$attendances ->firstitem() + $i}}</th>
                    <td>{{$attendance->level}}</td>
                    <td>{{$attendance->boys}}</td>
                    <td>{{$attendance->girls}}</td>
                    <td>{{$attendance->girls + $attendance->boys}}</td>
                    <td>{{$attendance->term}}</td>
                    <td>{{$attendance->date}}</td>
                    <td>{{$attendance->name}}</td>
                    <td>
                        <div class="btn-group" id="hover-dropdown-demo">
                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" data-trigger="hover">Select</button>
                            <div class="dropdown-menu">
                                <a href="{{URL::signedRoute('EditDailyAttendance', ['attendance_id' => $attendance->id])}}" class="btn btn-success btn-sm dropdown-item mb-1">Edit</a>
                                <button wire:click="deleteDailyAttendance({{ $attendance->id }})" class="btn btn-danger btn-sm dropdown-item mb-1">Delete</button>
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
            Showing {{$attendances ->firstItem()}} to {{$attendances ->lastItem()}} out of {{$attendances ->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$attendances ->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-daily-attendance')"><i class="feather icon-plus"></i> Add Attendance (s)</button>
        </div>
    </div>
</div>
