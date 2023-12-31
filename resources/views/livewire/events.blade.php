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
                    <th scope="col" wire:click="sortBy('our_teams.id')" style="cursor: pointer;">#
                        @include('partials._sort-icon',['field'=>'our_teams.id'])
                    </th>
                    <th scope="col" wire:click="sortBy('title')" style="cursor: pointer;"> Title
                        @include('partials._sort-icon',['field'=>'title'])
                    </th>
                    <th scope="col" wire:click="sortBy('title')" style="cursor: pointer;"> Event Photos
                        @include('partials._sort-icon',['field'=>'title'])
                    </th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($events as $i=>$event)
                <tr>
                    <th scope="row">{{$events->firstitem() + $i}}</th>
                    <td>{{$event->title}}</td>
                    <td class="text-center"><img src="{{ asset('storage/event_photos/'.$event->event_image)}}" style="width:80px; height:40px;"></td>
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
            Showing {{$events->firstItem()}} to {{$events->lastItem()}} out of {{$events->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$events->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-event')"><i class="feather icon-plus"></i> Add Event (s)</button>
        </div>
    </div>
</div>
