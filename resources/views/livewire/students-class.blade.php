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
        @foreach($students as $i=>$clas)
            <tr>
                <th scope="row">{{$i + 1}}</th>
                <td>{{$clas->level}} </td>
                @php
                    $get_class_id =\Modules\Students\Entities\Student::join('classes', 'classes.id', 'students.class_id')->where('classes.level',$clas->level)->value('class_id')
                @endphp
                <td>
                    <a href="/students/view-students-for-this-class/{{$get_class_id}}" class="btn btn-info btn-sm">View Students For This Class</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-student')"><i class="feather icon-plus"></i> Add Student(s)</button>
        </div>
    </div>
</div>
