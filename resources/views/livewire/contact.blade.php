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
                <th scope="col" wire:click="sortBy('messages.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'messages.id'])
                </th>
                <th scope="col" wire:click="sortBy('names')" style="cursor: pointer;"> Name
                    @include('partials._sort-icon',['field'=>'names'])
                </th>
                <th scope="col" wire:click="sortBy('contact')" style="cursor: pointer;"> Contact
                    @include('partials._sort-icon',['field'=>'contact'])
                </th>
                <th scope="col" wire:click="sortBy('subject')" style="cursor: pointer;"> Subject
                    @include('partials._sort-icon',['field'=>'subject'])
                </th>
                <th scope="col" wire:click="sortBy('message')" style="cursor: pointer;"> Message
                    @include('partials._sort-icon',['field'=>'message'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($messages as $i=>$message)
            <tr>
                <th scope="row">{{$messages->firstitem() + $i}}</th>
                <td>{{$message->names}}</td>
                <td>{{$message->contact}}</td>
                <td>{{$message->subject}}</td>
                <td>{{$message->message}}</td>
                <td>
                    <div class="btn-group" id="hover-dropdown-demo">
                        <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" data-trigger="hover">Select</button>
                        <div class="dropdown-menu">
                            <a href="#!" class="btn btn-secondary btn-sm dropdown-item mb-1">Edit</a>
                            <a href="#!" class="btn btn-danger btn-sm dropdown-item mb-1">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$messages->firstItem()}} to {{$messages->lastItem()}} out of {{$messages->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$messages->links()}}
        </div>
    </div>
</div>
