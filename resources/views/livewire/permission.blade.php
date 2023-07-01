<div>
    {{-- Success is as dangerous as failure. --}}
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
    <form class="form-horizontal mt-3" action="/permissions/assign-permissions/{{request()->route()->user_type_id}}" method="get">
                @csrf
        <div class="card">
                <table class="table card-table table-responsive">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#
                            </th>
                            <th>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" id="select_all" class="custom-control-input"/> <span class="custom-control-label">All Permissions</span>
                            </label>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $i=>$permission)
                        <tr>
                            <td scope="row">
                            {{$permissions->firstitem() + $i}}
                            </td>
                            <td> 
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="user_permisions[]" value="{{$permission->id}}">
                                <span class="custom-control-label">{{$permission->permission}}</span>
                            </label>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div class="form-group row text-center">
            <button type="button" class="btn btn-warning ml-2 mr-1"><a href="/permissions/view-permissions/{{request()->route()->user_type_id}}" style="color:white;">Back</a></button>
            
            <button type="submit" class="btn btn-primary ">Save</button>
        </div>
    </form>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$permissions->firstItem()}} to {{$permissions->lastItem()}} out of {{$permissions->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$permissions->links()}}
        </div>
    </div>
    </div>
</div>

