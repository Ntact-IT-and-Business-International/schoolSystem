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
                    <th scope="col" wire:click="sortBy('librays.id')" style="cursor: pointer;">#
                        @include('partials._sort-icon',['field'=>'librays.id'])
                    </th>
                    <th scope="col" wire:click="sortBy('subject')" style="cursor: pointer;"> Subject
                        @include('partials._sort-icon',['field'=>'subject'])
                    </th>
                    <th scope="col" wire:click="sortBy('level')" style="cursor: pointer;"> Class
                        @include('partials._sort-icon',['field'=>'level'])
                    </th>
                    <th scope="col" wire:click="sortBy('title')" style="cursor: pointer;"> Title
                        @include('partials._sort-icon',['field'=>'title'])
                    </th>
                    <th scope="col" wire:click="sortBy('number_of_books')" style="cursor: pointer;"> Number
                        @include('partials._sort-icon',['field'=>'number_of_books'])
                    </th>
                    <th scope="col" wire:click="sortBy('status')" style="cursor: pointer;"> Status
                        @include('partials._sort-icon',['field'=>'status'])
                    </th>
                    <th scope="col" wire:click="sortBy('date_of_entry')" style="cursor: pointer;"> Date
                        @include('partials._sort-icon',['field'=>'date_of_entry'])
                    </th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($libraries as $i=>$library)
                <tr>
                    <th scope="row">{{$libraries->firstitem() + $i}}</th>
                    <td>{{$library->subject}}</td>
                    <td>{{$library->level}}</td>
                    <td>{{ $library->title}}</td>
                    <td>{{$library->number_of_books}}</td>
                    <td>{{$library->status}}</td>
                    <td>{{$library->date_of_entry}}</td>
                    <td>
                        <div class="btn-group" id="hover-dropdown-demo">
                            <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" data-trigger="hover">Select</button>
                            <div class="dropdown-menu">
                                <a href="{{URL::signedRoute('EditLibrary', ['library_id' => $library->id])}}" class="btn btn-info btn-sm dropdown-item mb-1">Edit</a>
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
            Showing {{$libraries->firstItem()}} to {{$libraries->lastItem()}} out of {{$libraries->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$libraries->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-library')"><i class="feather icon-plus"></i> Add Library Books (s)</button>
        </div>
    </div>
</div>
