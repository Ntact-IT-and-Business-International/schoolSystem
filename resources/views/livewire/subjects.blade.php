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
                <th scope="col" wire:click="sortBy('subjects.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'subjects.id'])
                </th>
                <th scope="col" wire:click="sortBy('class')" style="cursor: pointer;"> Class
                    @include('partials._sort-icon',['field'=>'class'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($subjects as $i=>$subject)
            <tr>
                <th scope="row">{{$subjects->firstitem() + $i}}</th>
                <td>{{$subject->subject}}</td>
                <td>
                    <a href="{{URL::signedRoute('EditSubject', ['subject_id' => $subject->id])}}" class="btn btn-info btn-sm">Edit</a>
                    <button wire:click="deleteSubject({{ $subject->id }})" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$subjects->firstItem()}} to {{$subjects->lastItem()}} out of {{$subjects->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$subjects->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-subject')"><i class="feather icon-plus"></i> Add Subject (s)</button>
        </div>
    </div>
</div>
