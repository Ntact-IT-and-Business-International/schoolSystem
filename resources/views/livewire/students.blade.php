<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="card-header with-elements">
        <h6 class="card-header-title mb-0">
                <div class="form-group col-sm-6">
                    <select class="custom-select col-sm-6"  wire:model='perPage'>
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
                <th scope="col" wire:click="sortBy('students.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'students.id'])
                </th>
                <th scope="col" wire:click="sortBy('last_name')" style="cursor: pointer;"> Name
                    @include('partials._sort-icon',['field'=>'last_name'])
                </th>
                <th scope="col" wire:click="sortBy('date_of_birth')" style="cursor: pointer;"> Class
                    @include('partials._sort-icon',['field'=>'date_of_birth'])
                </th>
                <th scope="col" wire:click="sortBy('gender')" style="cursor: pointer;"> Gender
                    @include('partials._sort-icon',['field'=>'gender'])
                </th>
                <th scope="col" wire:click="sortBy('fees_pay_code')" style="cursor: pointer;"> Pay Code
                    @include('partials._sort-icon',['field'=>'fees_pay_code'])
                </th>
                <th scope="col" wire:click="sortBy('parents_name')" style="cursor: pointer;"> Parents Name
                    @include('partials._sort-icon',['field'=>'parents_name'])
                </th>
                <th scope="col" wire:click="sortBy('contact')" style="cursor: pointer;"> Contact
                    @include('partials._sort-icon',['field'=>'contact'])
                </th>
                <th scope="col" wire:click="sortBy('photo')" style="cursor: pointer;"> Photo
                    @include('partials._sort-icon',['field'=>'photo'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($students as $i=>$student)
            <tr>
                <th scope="row">{{$students->firstitem() + $i}}</th>
                <td>{{$student->last_name}} {{$student->first_name}} {{$student->other_names}}</td>
                <td>{{$student->level}}</td>
                <td>{{$student->gender}}</td>
                <td>{{$student->fees_pay_code}}</td>
                <td>{{$student->parents_name}}</td>
                <td>{{$student->contact}}</td>
                <td><img src="{{ asset('storage/Student_photos/'.$student->photo)}}" style="width:60px; height:40px;"></td>
                <td>
                    <div class="btn-group" id="hover-dropdown-demo">
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" data-trigger="hover">Select</button>
                        <div class="dropdown-menu">
                            <a href="{{URL::signedRoute('EditStudent', ['student_id' => $student->id])}}" class="btn btn-info btn-sm  dropdown-item mb-1">Edit Student</a>
                            <a href="{{URL::signedRoute('StudentDetails', ['student_id' => $student->id])}}" class="btn btn-secondary btn-sm dropdown-item mb-1">View More</a>
                            <a href="{{URL::signedRoute('UploadStudentPhoto', ['student_id' => $student->id])}}" class="btn btn-success btn-sm dropdown-item mb-1">Upload Photo</a>
                            <button wire:click="deleteStudent({{ $student->id }})" class="btn btn-danger btn-sm dropdown-item mb-1">Delete Student</button>
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
            Showing {{$students->firstItem()}} to {{$students->lastItem()}} out of {{$students->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$students->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-student')"><i class="feather icon-plus"></i> Add Student(s)</button>
        </div>
    </div>
</div>
