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
                <th scope="col" wire:click="sortBy('scholastic_requests.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'scholastic_requests.id'])
                </th>
                <th scope="col" wire:click="sortBy('name')" style="cursor: pointer;"> Name
                    @include('partials._sort-icon',['field'=>'name'])
                </th>
                <th scope="col" wire:click="sortBy('item_name')" style="cursor: pointer;"> Item Name
                    @include('partials._sort-icon',['field'=>'item_name'])
                </th>
                <th scope="col" wire:click="sortBy('number_of_items')" style="cursor: pointer;"> Number of Items
                    @include('partials._sort-icon',['field'=>'number_of_items'])
                </th>
                <th scope="col" wire:click="sortBy('status')" style="cursor: pointer;"> Status
                    @include('partials._sort-icon',['field'=>'status'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($items_requested as $i=>$item)
            <tr>
                <th scope="row">{{$items_requested->firstitem() + $i}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->item_name}}</td>
                <td>{{$item->number_of_items}}</td>
                <td>
                    @if($item->status == 'pending')
                        <a href="#!" class="badge badge-warning btn-sm btn" style="text-transform:capitalize;">{{$item->status}}</a>
                    @elseif($item->status =='approved')
                        <a href="#!" class="badge badge-primary btn-sm btn" style="text-transform:capitalize;">{{$item->status}}</a>
                    @else
                    <a href="#!" class="badge badge-pending btn-sm btn" style="text-transform:capitalize;">{{$item->status}}</a>
                    @endif
                </td>
                <td>
                    @if($item->status== "pending")
                        {{-- <button wire:click="approveRequest({{ $item->id }})" class="btn btn-success mb-1" style="text-transform: capitalize;padding:4px;">Approve</button> --}}
                        <a href="/mark-as-approved/{{$item->id}}" class="btn btn-success btn-sm">Approve</a>
                    @else
                        {{-- <span wire:click="rejectRequest({{ $item->id }})" class="btn btn-danger"  style="text-transform: capitalize;padding:4px;">Activate</span> --}}
                        <a href="/mark-as-rejected/{{$item->id}}" class="btn btn-primary btn-sm">Reject</a>
                    @endif 
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
            Showing {{$items_requested->firstItem()}} to {{$items_requested->lastItem()}} out of {{$items_requested->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$items_requested->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'request-for-item')"><i class="feather icon-plus"></i> Request For Item (s)</button>
        </div>
    </div>
</div>
