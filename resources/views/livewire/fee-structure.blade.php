<div>
    {{-- Success is as dangerous as failure. --}}
</div>
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
    <div class="card mb-4">
        <div class="row row-bordered mx-0">
        @foreach($fees_structures as $fee)
            <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                <a href="#ge" class="text-dark my-2">
                    <div class="card-body text-center py-4">
                        <div class="feather icon-file display-4 text-primary"></div>
                        <h5 class="m-0 mt-3" style="color:blue;"> {{$fee->levels}}  | {{$fee->category}} <a href="{{ asset('storage/Staff_document/'.$fee->fee_structure)}}" target="_blank">Download Fees</a></h5>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$fees_structures->firstItem()}} to {{$fees_structures->lastItem()}} out of {{$fees_structures->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$fees_structures->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-fee-structure')"><i class="feather icon-plus"></i> Add Fee Structure (s)</button>
        </div>
    </div>
</div>
