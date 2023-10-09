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
                    <th scope="col" wire:click="sortBy('level')" style="cursor: pointer;"> Name of Student
                        @include('partials._sort-icon',['field'=>'level'])
                    </th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($nursery_students as $i=>$student)
                <tr>
                    <th scope="row">{{$nursery_students->firstitem() + $i}}</th>
                    <td>{{$student->last_name}} {{$student->first_name}} {{$student->other_names}}</td>
                    <td>
                        <a href="/reportcard/print-nursery-midterm-results/{{$student->student_id}}/{{$student->term}}" class="btn btn-success btn-sm" target="_blank">Generate Nursery Midterm Results</a>
                        <a href="/reportcard/print-nursery-report-card/{{$student->student_id}}/{{$student->term}}" class="btn btn-info btn-sm" target="_blank">Generate Nursery Report Card</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$nursery_students->firstItem()}} to {{$nursery_students->lastItem()}} out of {{$nursery_students->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$nursery_students->links()}}
        </div>
    </div>
</div>
