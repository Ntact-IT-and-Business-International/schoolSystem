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
                    <th scope="col" wire:click="sortBy('nurses.id')" style="cursor: pointer;">#
                        @include('partials._sort-icon',['field'=>'nurses.id'])
                    </th>
                    <th scope="col" wire:click="sortBy('last_name')" style="cursor: pointer;"> Name
                        @include('partials._sort-icon',['field'=>'last_name'])
                    </th>
                    <th scope="col" wire:click="sortBy('level')" style="cursor: pointer;"> Class
                        @include('partials._sort-icon',['field'=>'level'])
                    </th>
                    <th scope="col" wire:click="sortBy('sickness')" style="cursor: pointer;"> Sickness
                        @include('partials._sort-icon',['field'=>'sickness'])
                    </th>
                    <th scope="col" wire:click="sortBy('prescription')" style="cursor: pointer;"> Prescription
                        @include('partials._sort-icon',['field'=>'prescription'])
                    </th>
                    <th scope="col" wire:click="sortBy('medicine')" style="cursor: pointer;"> Medicine
                        @include('partials._sort-icon',['field'=>'medicine'])
                    </th>
                    <th scope="col" wire:click="sortBy('comment')" style="cursor: pointer;"> Comment
                        @include('partials._sort-icon',['field'=>'comment'])
                    </th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($records as $i=>$record) 
                <tr>
                    <th scope="row">{{$records->firstitem() + $i}}</th> 
                    <td>{{$record->last_name}} {{$record->first_name}} {{$record->other_names}}</td>
                    <td>{{$record->level}}</td>
                    <td>{{ $record->sickness}}</td>
                    <td>{{$record->prescription}}</td>
                    <td>{{$record->medicine}}</td>
                    <td>{{$record->comment}}</td>
                    <td>
                        <div class="btn-group" id="hover-dropdown-demo">
                        <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" data-trigger="hover">Select</button>
                        <div class="dropdown-menu">
                            <a href="#!" class="btn btn-secondary btn-sm dropdown-item mb-1">Edit</a>
                            <a href="#!" class="btn btn-danger btn-sm dropdown-item mb-1">Delete</a>
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
            Showing {{$records->firstItem()}} to {{$records->lastItem()}} out of {{$records->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$records->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">

            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-nurse-record')"><i class="feather icon-plus"></i> Add Records (s)</button>
        </div>
    </div>
</div>
