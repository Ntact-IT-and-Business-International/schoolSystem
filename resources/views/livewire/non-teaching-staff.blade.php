<div>
    {{-- Success is as dangerous as failure. --}}
</div>
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
                <th scope="col" wire:click="sortBy('non_teaching_staffs.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'non_teaching_staffs.id'])
                </th>
                <th scope="col" wire:click="sortBy('staff_last_name')" style="cursor: pointer;"> Name
                    @include('partials._sort-icon',['field'=>'staff_last_name'])
                </th>
                <th scope="col" wire:click="sortBy('nin')" style="cursor: pointer;"> NIN
                    @include('partials._sort-icon',['field'=>'nin'])
                </th>
                <th scope="col" wire:click="sortBy('date_of_birth')" style="cursor: pointer;"> DOB
                    @include('partials._sort-icon',['field'=>'date_of_birth'])
                </th>
                <th scope="col" wire:click="sortBy('gender')" style="cursor: pointer;"> Sex
                    @include('partials._sort-icon',['field'=>'gender'])
                </th>
                <th scope="col" wire:click="sortBy('phone_number')" style="cursor: pointer;"> Contact
                    @include('partials._sort-icon',['field'=>'phone_number'])
                </th>
                <th scope="col" wire:click="sortBy('qualification')" style="cursor: pointer;"> Education
                    @include('partials._sort-icon',['field'=>'qualification'])
                </th>
                <th scope="col" wire:click="sortBy('title')" style="cursor: pointer;"> Title
                    @include('partials._sort-icon',['field'=>'title'])
                </th>
                <th scope="col" wire:click="sortBy('documents')" style="cursor: pointer;"> Documents
                    @include('partials._sort-icon',['field'=>'documents'])
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
        @foreach($non_teaching_staffs as $i=>$staff)
            <tr>
                <th scope="row">{{$non_teaching_staffs->firstitem() + $i}}</th>
                <td>{{$staff->staff_last_name}} {{$staff->staff_first_name}} {{$staff->staff_other_names}}</td>
                <td>{{$staff->nin}}</td>
                <td>{{$staff->date_of_birth}}</td>
                <td>{{$staff->gender}}</td>
                <td>{{$staff->phone_number}}</td>
                <td>{{$staff->qualification}}</td>
                <td>{{$staff->title}}</td>
                <td style="color:blue;"><a href="{{ asset('storage/Staff_document/'.$staff->documents)}}" style="width:60px; height:40px;" target="_blank">View Documents</a></td>
                <td>{{ number_format($staff->salary)}}</td>
                <td><img src="{{ asset('storage/Staff_photos/'.$staff->photo)}}" style="width:60px; height:40px;"></td>
                <td>
                    <a href="#!" class="btn btn-info btn-sm">Edit</a>
                    <a href="#!" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$non_teaching_staffs->firstItem()}} to {{$non_teaching_staffs->lastItem()}} out of {{$non_teaching_staffs->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$non_teaching_staffs->links()}}
        </div>
    </div>
</div>
