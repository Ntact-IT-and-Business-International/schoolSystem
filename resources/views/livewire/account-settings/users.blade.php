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
                <th scope="col" wire:click="sortBy('users.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'users.id'])
                </th>
                <th scope="col" wire:click="sortBy('name')" style="cursor: pointer;"> Name
                    @include('partials._sort-icon',['field'=>'name'])
                </th>
                <th scope="col" wire:click="sortBy('email')" style="cursor: pointer;"> Email
                    @include('partials._sort-icon',['field'=>'email'])
                </th>
                <th scope="col" wire:click="sortBy('category')" style="cursor: pointer;"> Category
                    @include('partials._sort-icon',['field'=>'category'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $i=>$user)
            <tr>
                <th scope="row">{{$users->firstitem() + $i}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->category}}</td>
                <td>
                    <div class="btn-group" id="hover-dropdown-demo">
                        <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" data-trigger="hover">Select</button>
                        <div class="dropdown-menu">
                            <a href="{{URL::signedRoute('editUser', ['user_id' => $user->id])}}" class="btn btn-secondary btn-sm dropdown-item mb-1">Edit</a>
                            <button wire:click="deleteUser({{ $user->id }})" class="btn btn-danger btn-sm mb-1 dropdown-item">Delete</button>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$users->firstItem()}} to {{$users->lastItem()}} out of {{$users->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$users->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'account-settings.add-user')"><i class="feather icon-plus"></i> Add User(s)</button>
        </div>
    </div>
</div>
