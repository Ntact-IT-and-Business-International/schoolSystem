<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
<div class="row">
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
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ asset('Admin/assets/img/pages/interview.svg')}}" alt="image" class="img-fluid mb-2">
                    @foreach ($user_types as $type)
                    <h5 class="font-weight-bold">{{$type->category}}</h5>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm mb-0">
                    <thead>
                        <tr>
                            <th scope="col" wire:click="sortBy('user_type_permissions.id')" style="cursor: pointer;">#
                                @include('partials._sort-icon',['field'=>'user_type_permissions.id'])
                            </th>
                            <th scope="col" wire:click="sortBy('permission')" style="cursor: pointer;"> Permission
                                @include('partials._sort-icon',['field'=>'permission'])
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($all_permissions as $i=>$type)
                            <tr>
                                <td>{{$all_permissions->firstitem() + $i}}</td>
                                <td>{{$type->permission}}</td>
                                <td><a href="/permissions/remove/{{$type->permission}}" class="btn btn-info btn-sm">Remove</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$all_permissions->firstItem()}} to {{$all_permissions->lastItem()}} out of {{$all_permissions->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$all_permissions->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
                <span><a href="/permissions/select-permissions/{{request()->route()->category_id}}" class="btn btn-outline-primary mt-md-0 mt-2">Select Permission</a></span>
        </div>
    </div>
</div>

