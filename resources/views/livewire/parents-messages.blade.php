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
                    <th scope="col" wire:click="sortBy('complains.id')" style="cursor: pointer;">#
                        @include('partials._sort-icon',['field'=>'complains.id'])
                    </th>
                    <th scope="col" wire:click="sortBy('last_name')" style="cursor: pointer;"> Name of Students
                        @include('partials._sort-icon',['field'=>'last_name'])
                    </th>
                    <th scope="col" wire:click="sortBy('level')" style="cursor: pointer;"> Class
                        @include('partials._sort-icon',['field'=>'level'])
                    </th>
                    <th scope="col" wire:click="sortBy('complain')" style="cursor: pointer;"> Complain
                        @include('partials._sort-icon',['field'=>'complain'])
                    </th>
                    <th scope="col" wire:click="sortBy('reply')" style="cursor: pointer;"> Reply
                        @include('partials._sort-icon',['field'=>'reply'])
                    </th>
                    <th scope="col" wire:click="sortBy('name')" style="cursor: pointer;"> Officer
                        @include('partials._sort-icon',['field'=>'name'])
                    </th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($complains as $i=>$complain)
                <tr>
                    <th scope="row">{{$complains->firstitem() + $i}}</th>
                    <td>{{$complain->last_name}} {{$complain->first_name}} {{$complain->other_names}}</td>
                    <td>{{$complain->level}}</td>
                    <td>{{ $complain->complain}}</td>
                    <td>{{$complain->reply}}</td>
                    <td>{{$complain->name}}</td>
                    <td>
                        <div class="btn-group" id="hover-dropdown-demo">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" data-trigger="hover">Select</button>
                            <div class="dropdown-menu">
                                <a href="/contact/reply-complain/{{$complain->id}}" class="btn btn-success btn-sm mb-1">Reply Complain</a>
                                <a href="#!" class="btn btn-info btn-sm dropdown-item mb-1">Edit</a>
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
            Showing {{$complains->firstItem()}} to {{$complains->lastItem()}} out of {{$complains->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$complains->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-complain')"><i class="feather icon-plus"></i> Add Complain (s)</button>
        </div>
    </div>
</div>
