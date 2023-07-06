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
                <th>#</th>
                <th>Class</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($distinctData as $i=>$class)
            @php
                $class_level =\Modules\Students\Entities\Student::join('classes', 'classes.id', 'students.class_id')->where('students.class_id',$class->class_id)->value('classes.level');
            @endphp
            <tr>
                <th scope="row">{{$i + 1}}</th>
                <td>{{$class_level}}</td>
                <td>
                    <a href="/students/students-per-class-per-year/{{$class->class_id}}" class="btn btn-success btn-md">View Students For This Class</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
