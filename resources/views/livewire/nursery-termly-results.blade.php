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
                    <th scope="col" wire:click="sortBy('results.id')" style="cursor: pointer;">#
                        @include('partials._sort-icon',['field'=>'results.id'])
                    </th>
                    <th scope="col" wire:click="sortBy('term')" style="cursor: pointer;"> Terms
                        @include('partials._sort-icon',['field'=>'term'])
                    </th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($nursery_termly_results as $i=>$result)
                <tr>
                    <th scope="row">{{$nursery_termly_results->firstitem() + $i}}</th>
                    <td>Term {{$result->term}}</td>
                    <td>
                        <a href="/reportcard/view-nursery-termly-classes/{{$result->term}}" class="btn btn-info btn-sm">View Classes</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$nursery_termly_results->firstItem()}} to {{$nursery_termly_results->lastItem()}} out of {{$nursery_termly_results->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$nursery_termly_results->links()}}
        </div>
    </div>
</div>
