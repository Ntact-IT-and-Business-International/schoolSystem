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
                    <th scope="col" wire:click="sortBy('results.id')" style="cursor: pointer;">#
                        @include('partials._sort-icon',['field'=>'results.id'])
                    </th>
                    <th scope="col" wire:click="sortBy('last_name')" style="cursor: pointer;"> Name
                        @include('partials._sort-icon',['field'=>'last_name'])
                    </th>
                    <th scope="col" wire:click="sortBy('level')" style="cursor: pointer;"> Class
                        @include('partials._sort-icon',['field'=>'level'])
                    </th>
                    <th scope="col" wire:click="sortBy('subject')" style="cursor: pointer;"> Subject
                        @include('partials._sort-icon',['field'=>'subject'])
                    </th>
                    <th scope="col" wire:click="sortBy('term')" style="cursor: pointer;"> Term
                        @include('partials._sort-icon',['field'=>'term'])
                    </th>
                    <th scope="col" wire:click="sortBy('assessment_marks')" style="cursor: pointer;"> Test
                        @include('partials._sort-icon',['field'=>'assessment_marks'])
                    </th>
                    <th scope="col" wire:click="sortBy('assessment_grade')" style="cursor: pointer;"> Grade
                        @include('partials._sort-icon',['field'=>'assessment_grade'])
                    </th>
                    <th scope="col" wire:click="sortBy('examination_marks')" style="cursor: pointer;"> Exams
                        @include('partials._sort-icon',['field'=>'examination_marks'])
                    </th>
                    {{-- <th scope="col" wire:click="sortBy('examination_marks')" style="cursor: pointer;"> Total Marks
                        @include('partials._sort-icon',['field'=>'examination_marks'])
                    </th> --}}
                    <th scope="col" wire:click="sortBy('grade')" style="cursor: pointer;"> Grade
                        @include('partials._sort-icon',['field'=>'grade'])
                    </th>
                    <th scope="col" wire:click="sortBy('teacher_initials')" style="cursor: pointer;"> Initials
                        @include('partials._sort-icon',['field'=>'teacher_initials'])
                    </th>
                    <th scope="col" wire:click="sortBy('remark')" style="cursor: pointer;"> Remarks
                        @include('partials._sort-icon',['field'=>'remark'])
                    </th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($results as $i=>$result)
                <tr>
                    <th scope="row">{{$results->firstitem() + $i}}</th>
                    <td>{{$result->last_name}} {{$result->first_name}} {{$result->other_names}}</td>
                    <td>{{$result->level}}</td>
                    <td>{{ $result->subject}}</td>
                    <td>{{ $result->term}}</td>
                    <td>{{$result->assessment_marks}}</td>
                    <td style="color:red; font-weight:bold;">{{$result->assessment_grade}}</td>
                    <td>{{$result->examination_marks}}</td>
                    {{-- <td>{{$result->assessment_marks + $result->examination_marks}}</td> --}}
                    <td style="color:red; font-weight:bold;">{{$result->grade}}</td>
                    <td>{{$result->teacher_initials}}</td>
                    <td>{{$result->remark}}</td>
                    <td>
                        <div class="btn-group" id="hover-dropdown-demo">
                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" data-trigger="hover">Select</button>
                                <div class="dropdown-menu">
                                    <a href="{{URL::signedRoute('EditResults', ['result_id' => $result->id])}}" class="btn btn-info dropdown-item  mb-1 btn-sm">Edit</a>
                                    <a href="#!" class="btn btn-danger dropdown-item  btn-sm">Delete</a>
                                    {{-- <button wire:click="deleteStaff({{ $staff->id }})" class="btn btn-danger btn-sm dropdown-item mb-1">Delete</button> --}}
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
            Showing {{$results->firstItem()}} to {{$results->lastItem()}} out of {{$results->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$results->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-result')"><i class="feather icon-plus"></i> Add Result (s)</button>
        </div>
    </div>
</div>
