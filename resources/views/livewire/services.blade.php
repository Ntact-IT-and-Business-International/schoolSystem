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
                    <th scope="col" wire:click="sortBy('services.id')" style="cursor: pointer;">#
                        @include('partials._sort-icon',['field'=>'services.id'])
                    </th>
                    <th scope="col" wire:click="sortBy('service')" style="cursor: pointer;"> Title
                        @include('partials._sort-icon',['field'=>'service'])
                    </th>
                    <th scope="col" wire:click="sortBy('content')" style="cursor: pointer;"> Content
                        @include('partials._sort-icon',['field'=>'content'])
                    </th>
                    <th scope="col" wire:click="sortBy('content')" style="cursor: pointer;"> Photos
                        @include('partials._sort-icon',['field'=>'content'])
                    </th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($services as $i=>$service) 
                <tr>
                    <th scope="row">{{$services->firstitem() + $i}}</th>
                    <td>{{$service->service}}</td>
                    <td>{{$service->content}}</td>
                    <td class="text-center"><img src="{{ asset('storage/service_photos/'.$service->image)}}" style="width:80px; height:40px;"></td>
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
            Showing {{$services->firstItem()}} to {{$services->lastItem()}} out of {{$services->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$services->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-service')"><i class="feather icon-plus"></i> Add Service (s)</button>
        </div>
    </div>
</div>
