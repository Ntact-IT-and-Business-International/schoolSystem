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
                    <th scope="col" wire:click="sortBy('portfolios.id')" style="cursor: pointer;">#
                        @include('partials._sort-icon',['field'=>'portfolios.id'])
                    </th>
                    <th scope="col" wire:click="sortBy('category')" style="cursor: pointer;"> Category
                        @include('partials._sort-icon',['field'=>'category'])
                    </th>
                    <th scope="col" wire:click="sortBy('title')" style="cursor: pointer;"> Title
                        @include('partials._sort-icon',['field'=>'title'])
                    </th>
                    <th scope="col" wire:click="sortBy('date_of_activity')" style="cursor: pointer;"> Date
                        @include('partials._sort-icon',['field'=>'date_of_activity'])
                    </th>
                    <th scope="col" wire:click="sortBy('content')" style="cursor: pointer;"> Photos
                        @include('partials._sort-icon',['field'=>'content'])
                    </th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($blogs as $i=>$blog) 
                <tr>
                    <th scope="row">{{$blogs->firstitem() + $i}}</th>
                    <td>{{$blog->category}}</td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->date_of_activity}}</td>
                    <td class="text-center"><img src="{{ asset('storage/portfolio_photos/'.$blog->image)}}" style="width:80px; height:40px;"></td>
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
            Showing {{$blogs->firstItem()}} to {{$blogs->lastItem()}} out of {{$blogs->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$blogs->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-portfolio')"><i class="feather icon-plus"></i> Add Portfolio (s)</button>
        </div>
    </div>
</div>
