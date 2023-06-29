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
                <th scope="col" wire:click="sortBy('students.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'students.id'])
                </th>
                <th scope="col" wire:click="sortBy('level')" style="cursor: pointer;"> Class
                    @include('partials._sort-icon',['field'=>'level'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($student_classes as $i=>$class)
            <tr>
                <th scope="row">{{$student_classes->firstitem() + $i}}</th>
                <td>{{$class->level}}</td>
                <td>
                    <a href="{{URL::signedRoute('StudentsList', ['class_id' => $class->class_id])}}" class="btn btn-info btn-md">View Students For This Class</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$student_classes->firstItem()}} to {{$student_classes->lastItem()}} out of {{$student_classes->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$student_classes->links()}}
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
