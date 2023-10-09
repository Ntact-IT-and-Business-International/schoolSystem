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
                    <th scope="col" wire:click="sortBy('level')" style="cursor: pointer;"> Class
                        @include('partials._sort-icon',['field'=>'level'])
                    </th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($nursery_termly_classes as $i=>$clas)
                <tr>
                    <th scope="row">{{$nursery_termly_classes->firstitem() + $i}}</th>
                    <td>{{$clas->level}}</td>
                    @php
                        $class_id =\Modules\ReportCard\Entities\Result::where('class_id',$clas->level)->get();
                    @endphp
                    <td>
                        <a href="/reportcard/view-nursery-students/{{$clas->class_id}}/{{$clas->term}}" class="btn btn-info btn-sm">View Students</a>
                        <a href="/reportcard/nursery-midterm-marksheet/{{$clas->class_id}}/{{$clas->term}}" class="btn btn-secondary btn-sm">Midterm Marksheet</a>
                        <a href="/reportcard/nursery-exam-marksheet/{{$clas->class_id}}/{{$clas->term}}" class="btn btn-success btn-sm">Exams Marksheet</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$nursery_termly_classes->firstItem()}} to {{$nursery_termly_classes->lastItem()}} out of {{$nursery_termly_classes->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$nursery_termly_classes->links()}}
        </div>
    </div>
</div>
