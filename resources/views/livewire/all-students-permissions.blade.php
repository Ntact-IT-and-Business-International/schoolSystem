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
                    <th scope="col" wire:click="sortBy('last_name')" style="cursor: pointer;"> Student
                        @include('partials._sort-icon',['field'=>'last_name'])
                    </th>
                    <th scope="col" wire:click="sortBy('level')" style="cursor: pointer;"> Class
                        @include('partials._sort-icon',['field'=>'level'])
                    </th>
                    <th scope="col" wire:click="sortBy('name')" style="cursor: pointer;"> Teacher
                        @include('partials._sort-icon',['field'=>'name'])
                    </th>
                    <th scope="col" wire:click="sortBy('reason')" style="cursor: pointer;"> Reason
                        @include('partials._sort-icon',['field'=>'reason'])
                    </th>
                    <th scope="col" wire:click="sortBy('contact')" style="cursor: pointer;">Parents Contact
                        @include('partials._sort-icon',['field'=>'contact'])
                    </th>
                    <th scope="col" wire:click="sortBy('destination')" style="cursor: pointer;"> Home
                        @include('partials._sort-icon',['field'=>'destination'])
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
            @foreach($permissions_request as $i=>$permission)
                @php
                $feedback_replier =\Modules\Permissions\Entities\PermissionRequest::join('users', 'users.id', 'permission_requests.reply_id')->whereNotNull('reply')->value('users.name')
                @endphp
                <tr>
                    <th scope="row">{{$permissions_request->firstitem() + $i}}</th>
                    <td>{{$permission->last_name}} {{$permission->first_name}} {{$permission->other_names}}</td>
                    <td>{{$permission->level}}</td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->reason}}</td>
                    <td>{{$permission->contact}}</td>
                    <td>{{$permission->destination}}</td>
                    
                        @if($permission->permission_status =='pending')
                    <td><span class="badge badge-info btn-sm">{{$permission->permission_status}}</span></td>
                    @elseif($permission->permission_status =='rejected')
                    <td><span class="badge badge-danger btn-md">{{$permission->permission_status}}</span></td>
                    @else
                    <td ><span class="badge badge-success btn-md">{{$permission->permission_status}}</span></td>
                    @endif
                    
                    <td>{{$permission->created_at}}</td>
                    <td>
                        <button wire:click="approvesTeachersPermission({{ $permission->id }})" class="btn btn-success btn-sm  btn-square"  style="text-transform: capitalize">Approve</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$permissions_request->firstItem()}} to {{$permissions_request->lastItem()}} out of {{$permissions_request->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$permissions_request->links()}}
        </div>
    </div>
</div>
