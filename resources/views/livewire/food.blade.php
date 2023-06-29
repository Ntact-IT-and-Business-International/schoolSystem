<div>
    {{-- Success is as dangerous as failure. --}}
</div>
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
                <th scope="col" wire:click="sortBy('stores.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'stores.id'])
                </th>
                <th scope="col" wire:click="sortBy('item_name')" style="cursor: pointer;"> Item
                    @include('partials._sort-icon',['field'=>'item_name'])
                </th>
                <th scope="col" wire:click="sortBy('number')" style="cursor: pointer;"> Quantity
                    @include('partials._sort-icon',['field'=>'number'])
                </th>
                <th scope="col" wire:click="sortBy('term')" style="cursor: pointer;"> Term
                    @include('partials._sort-icon',['field'=>'term'])
                </th>
                <th scope="col" wire:click="sortBy('responsible_person')" style="cursor: pointer;"> Persons
                    @include('partials._sort-icon',['field'=>'responsible_person'])
                </th>
                <th scope="col" wire:click="sortBy('date')" style="cursor: pointer;"> Date
                    @include('partials._sort-icon',['field'=>'date'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($foods as $i=>$food)
            <tr>
                <th scope="row">{{$foods->firstitem() + $i}}</th>
                <td>{{$food->item_name}}</td>
                <td>{{$food->number}} {{ $food->unit}}</td>
                <td>{{ $food->term}}</td>
                <td>{{$food->responsible_person}}</td>
                <td>{{$food->date}}</td>
                <td>
                    <a href="#!" class="btn btn-info btn-sm">Edit</a>
                    <a href="#!" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$foods->firstItem()}} to {{$foods->lastItem()}} out of {{$foods->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$foods->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-daily-food-usage')"><i class="feather icon-plus"></i> Add Food Usage (s)</button>
        </div>
    </div>
</div>
