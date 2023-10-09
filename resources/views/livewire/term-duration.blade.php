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
                <th scope="col" wire:click="sortBy('terms_durations.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'terms_durations.id'])
                </th>
                <th scope="col" wire:click="sortBy('term')" style="cursor: pointer;"> Term
                    @include('partials._sort-icon',['field'=>'term'])
                </th>
                <th scope="col" wire:click="sortBy('start_date')" style="cursor: pointer;"> Start Date
                    @include('partials._sort-icon',['field'=>'start_date'])
                </th>
                <th scope="col" wire:click="sortBy('end_date')" style="cursor: pointer;"> End Date
                    @include('partials._sort-icon',['field'=>'end_date'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($durations as $i=>$duration)
            <tr>
                <th scope="row">{{$durations->firstitem() + $i}}</th>
                <td>{{$duration->term}}</td>
                <td>{{$duration->start_date}}</td>
                <td>{{$duration->end_date}}</td>
                <td>
                    <a href="{{URL::signedRoute('editTermDuration', ['term_duration_id' => $duration->id])}}" class="btn btn-info btn-sm mb-1">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$durations->firstItem()}} to {{$durations->lastItem()}} out of {{$durations->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$durations->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-term-duration')"><i class="feather icon-plus"></i> Add Duration (s)</button>
        </div>
    </div>
</div>
