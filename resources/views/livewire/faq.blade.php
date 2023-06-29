<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="card-header with-elements">
        <h6 class="card-header-question mb-0">
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
                <th scope="col" wire:click="sortBy('our_faqs.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'our_faqs.id'])
                </th>
                <th scope="col" wire:click="sortBy('heading')" style="cursor: pointer;"> Heading
                    @include('partials._sort-icon',['field'=>'heading'])
                </th>
                <th scope="col" wire:click="sortBy('question')" style="cursor: pointer;"> question
                    @include('partials._sort-icon',['field'=>'question'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($faqs as $i=>$faq)
            <tr>
                <th scope="row">{{$faqs->firstitem() + $i}}</th>
                <td>{{$faq->heading}}</td>
                <td>{{$faq->question}}</td>
                <td>
                    <a href="#!" class="btn btn-info btn-sm">Edit</a>
                    <a href="#!" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$faqs->firstItem()}} to {{$faqs->lastItem()}} out of {{$faqs->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$faqs->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-faq')"><i class="feather icon-plus"></i> Add FAQ (s)</button>
        </div>
    </div>
</div>
