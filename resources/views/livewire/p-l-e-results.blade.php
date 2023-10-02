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
                <th scope="col" wire:click="sortBy('ple_results.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'ple_results.id'])
                </th>
                <th scope="col" wire:click="sortBy('div1')" style="cursor: pointer;"> Div1
                    @include('partials._sort-icon',['field'=>'div1'])
                </th>
                <th scope="col" wire:click="sortBy('div2')" style="cursor: pointer;"> Div2
                    @include('partials._sort-icon',['field'=>'div2'])
                </th>
                <th scope="col" wire:click="sortBy('div3')" style="cursor: pointer;"> Div3
                    @include('partials._sort-icon',['field'=>'div3'])
                </th>
                <th scope="col" wire:click="sortBy('div4')" style="cursor: pointer;"> Div4
                    @include('partials._sort-icon',['field'=>'div4'])
                </th>
                <th scope="col" wire:click="sortBy('U')" style="cursor: pointer;"> U
                    @include('partials._sort-icon',['field'=>'U'])
                </th>
                <th scope="col" wire:click="sortBy('X')" style="cursor: pointer;"> X
                    @include('partials._sort-icon',['field'=>'X'])
                </th>
                <th scope="col" wire:click="sortBy('total')" style="cursor: pointer;"> Total
                    @include('partials._sort-icon',['field'=>'total'])
                </th>
                <th scope="col" wire:click="sortBy('year')" style="cursor: pointer;"> Year
                    @include('partials._sort-icon',['field'=>'year'])
                </th>
                <th scope="col" wire:click="sortBy('result')" style="cursor: pointer;"> Results
                    @include('partials._sort-icon',['field'=>'result'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ple_results as $i=>$result)
            <tr>
                <th scope="row">{{$ple_results->firstitem() + $i}}</th>
                <td>{{$result->div1}}</td>
                <td>{{$result->div2}}</td>
                <td>{{$result->div3}}</td>
                <td>{{$result->div4}}</td>
                <td>{{$result->U}}</td>
                <td>{{$result->X}}</td>
                <td>{{$result->total}}</td>
                <td>{{$result->year}}</td>
                <td><a href="{{ asset('storage/Ple_Results/'.$result->result)}}" style="color:blue;" target="_blank">View Results</a></td>
                <td>
                    <div class="btn-group" id="hover-dropdown-demo">
                        <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" data-trigger="hover">Select</button>
                        <div class="dropdown-menu">
                            <a href="{{URL::signedRoute('EditPleResults', ['ple_result_id' => $result->id])}}" class="btn btn-info btn-sm dropdown-item mb-1">Edit</a>
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
            Showing {{$ple_results->firstItem()}} to {{$ple_results->lastItem()}} out of {{$ple_results->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$ple_results->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-p-l-e-results')"><i class="feather icon-plus"></i> Add PLE Result (s)</button>
        </div>
    </div>
</div>
