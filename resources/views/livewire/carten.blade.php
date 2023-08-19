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
                <th scope="col" wire:click="sortBy('carteens.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'carteens.id'])
                </th>
                <th scope="col" wire:click="sortBy('last_name')" style="cursor: pointer;"> Student
                    @include('partials._sort-icon',['field'=>'last_name'])
                </th>
                <th scope="col" wire:click="sortBy('item_bought')" style="cursor: pointer;"> Item
                    @include('partials._sort-icon',['field'=>'item_bought'])
                </th>
                <th scope="col" wire:click="sortBy('number')" style="cursor: pointer;"> Quantity
                    @include('partials._sort-icon',['field'=>'number'])
                </th>
                <th scope="col" wire:click="sortBy('price')" style="cursor: pointer;">Unit Price
                    @include('partials._sort-icon',['field'=>'price'])
                </th>
                <th scope="col" wire:click="sortBy('price')" style="cursor: pointer;">Total Amount
                    @include('partials._sort-icon',['field'=>'price'])
                </th>
                <th scope="col" wire:click="sortBy('name')" style="cursor: pointer;">ShopKeeper
                    @include('partials._sort-icon',['field'=>'name'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($canteens as $i=>$carteen)
            <tr>
                <th scope="row">{{$canteens->firstitem() + $i}}</th>
                <td>{{$carteen->last_name}} {{$carteen->first_name}} {{$carteen->other_names}}</td>
                <td>{{$carteen->item_bought}}</td>
                <td>{{$carteen->number}}</td>
                <td>{{ number_format($carteen->price)}}</td>
                <td>{{ number_format($carteen->price * $carteen->number)}}</td>
                <td>{{$carteen->name}}</td>
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
            Showing {{$canteens->firstItem()}} to {{$canteens->lastItem()}} out of {{$canteens->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$canteens->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-carteen')"><i class="feather icon-plus"></i> Add Canteen Details (s)</button>
        </div>
    </div>
</div>
