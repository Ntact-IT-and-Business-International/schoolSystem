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
        @foreach($students as $i=>$student)
            <tr>
                <th scope="row">{{$students->firstitem() + $i}}</th>
                <td>{{$student->last_name}} {{$student->first_name}} {{$student->other_names}}</td>
                <td>
                    <a href="/reportcard/print-midterm-results/{{$student->student_id}}/{{$student->term}}" class="btn btn-success btn-sm">Generate Midterm Results</a>
                    <a href="/reportcard/print-report-card/{{$student->student_id}}/{{$student->term}}" class="btn btn-info btn-sm">Generate Report Card</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$students->firstItem()}} to {{$students->lastItem()}} out of {{$students->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$students->links()}}
        </div>
    </div>
</div>
