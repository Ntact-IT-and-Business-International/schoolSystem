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
                <th scope="col" wire:click="sortBy('permission_requests.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'permission_requests.id'])
                </th>
                <th scope="col" wire:click="sortBy('category')" style="cursor: pointer;"> Office
                    @include('partials._sort-icon',['field'=>'category'])
                </th>
                <th scope="col" wire:click="sortBy('reason')" style="cursor: pointer;"> Reason
                    @include('partials._sort-icon',['field'=>'reason'])
                </th>
                <th scope="col" wire:click="sortBy('reply')" style="cursor: pointer;"> Reply
                    @include('partials._sort-icon',['field'=>'reply'])
                </th>
                <th scope="col" wire:click="sortBy('permission_status')" style="cursor: pointer;"> Status
                    @include('partials._sort-icon',['field'=>'permission_status'])
                </th>
                <th scope="col" wire:click="sortBy('created_at')" style="cursor: pointer;"> Date
                    @include('partials._sort-icon',['field'=>'created_at'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($my_permissions as $i=>$permission)
            <tr>
                <th scope="row">{{$my_permissions->firstitem() + $i}}</th>
                <td>{{$permission->category}}</td>
                <td>{{$permission->reason}}</td>
                <td>{{$permission->reply}} By <span style="color:blue;">{{$permission->name}}</span></td>
                    @if($permission->permission_status =='pending')
                <td><span class="badge badge-info btn-md" style="padding:5px;">{{$permission->permission_status}}</span></td>
                @elseif($permission->permission_status =='rejected')
                <td><span class="badge badge-danger btn-md">{{$permission->permission_status}}</span></td>
                @else
                <td ><span class="badge badge-success btn-md">{{$permission->permission_status}}</span></td>
                @endif
                
                <td>{{$permission->created_at}}</td>
                <td>
                    <a href="{{URL::signedRoute('forwardPermission', ['permission_id' => $permission->id])}}" class="btn btn-warning btn-sm  btn-square">Forward</a>
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
            Showing {{$my_permissions->firstItem()}} to {{$my_permissions->lastItem()}} out of {{$my_permissions->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$my_permissions->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'request-for-permission')"><i class="feather icon-plus"></i> Request For Permission (s)</button>
        </div>
    </div>
</div>
