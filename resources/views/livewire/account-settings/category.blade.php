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
                    <th scope="col" wire:click="sortBy('user_types.id')" style="cursor: pointer;">#
                        @include('partials._sort-icon',['field'=>'user_types.id'])
                    </th>
                    <th scope="col" wire:click="sortBy('category')" style="cursor: pointer;"> Category
                        @include('partials._sort-icon',['field'=>'category'])
                    </th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($user_types as $i=>$types)
                <tr>
                    <th scope="row">{{$user_types->firstitem() + $i}}</th>
                    <td>{{$types->category}}</td>
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
            Showing {{$user_types->firstItem()}} to {{$user_types->lastItem()}} out of {{$user_types->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$user_types->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'account-settings.add-category')"><i class="feather icon-plus"></i> Add Nurse(s)</button>
        </div>
    </div>
</div>
