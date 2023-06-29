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
        @foreach($holiday_packages as $package)
            <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                <a href="#ge" class="text-dark my-2">
                    <div class="card-body text-center py-4">
                        <div class="feather icon-file display-4 text-primary">&nbsp; Term &nbsp;{{$package->term}}</div>
                        <h5 class="m-0 mt-3" style="color:blue;"> {{$package->level}}  | {{$package->subject}} <a href="{{ asset('storage/Staff_document/'.$package->package)}}" target="_blank">Download Fees</a></h5>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$holiday_packages->firstItem()}} to {{$holiday_packages->lastItem()}} out of {{$holiday_packages->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$holiday_packages->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-holiday-package')"><i class="feather icon-plus"></i> Add Holiday Package (s)</button>
        </div>
    </div>
</div>
