<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="card">
        <div class="card-body p-5">
            <div class="row">
                <div class="col-sm-12 pb-4 text-center">
                <div class="media align-items-center" style="margin-bottom:1px;">
                    <a href="!#" class="navbar-brand app-brand demo py-0 mr-4">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('safeway.jpg')}}" style="width:100px;height:100px;" alt="Brand Logo" class="img-fluid">
                        </span>
                        <span class="app-brand-text demo font-weight-bold text-dark ml-4" style="text-transform:uppercase;font-size:35px;">Safeway Junior School</span>
                    </a>
                </div>
                    <div class="mb-1" style="font-weight:bold; text-transform:uppercase;font-size:25px;">Kawempe- TTula</div>
                    <div class="mb-1" style="font-weight:bold; text-transform:uppercase;font-size:20px;">0772-380547 | 0702-932992</div>
                    <div style="box-shadow: 0 0 0 1px #8897AA inset; font-weight:bold; text-transform:uppercase;font-style:italic;">School Fees Payment Receipt</div>
                </div>
            </div>
            <hr class="mb-4">
            @foreach($print_receipts as $detail)
            <div class="row">
                
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2 text-danger">No: &nbsp;<span style="color:red;">2023{{$detail->id}}</span></div>
                </div>
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2"></div>
                </div>
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2">Date:&nbsp; <span class="text-muted">{{$detail->created_at}}</span></div>
                </div>
            </div>
            
            @endforeach
            <hr class="mb-4">
            <div class="row">
                <div class="col-sm-6 mb-4">
                    <div class="font-weight-bold mb-2"><span style="font-style:italic;">Received with thanks from</span> :&nbsp;<span class="text-muted" style="border-bottom:1px dotted; width:500px;">{{$detail->last_name}} {{$detail->first_name}} {{$detail->other_names}}</div>
                </div>
                <div class="col-sm-6 mb-4 text-right">
                    <div class="font-weight-bold mb-2"><span style="font-style:italic;">Class</span> :&nbsp;<span class="text-muted" style="border-bottom:1px dotted; width:500px;">{{$detail->level}}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mb-4">
                    <div class="font-weight-bold mb-2"><span style="font-style:italic;">The sum of Shillings:</span>&nbsp; <span style="text-transform:capitalize;border-bottom:1px dotted" class="text-muted" >{{$this->convert_number_to_words($detail->amount_paid)}} Shillings Only</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mb-4">
                    <div class="font-weight-bold mb-2"><span style="font-style:italic;">Being payment of:</span>&nbsp;<span class="text-muted" style="border-bottom:1px dotted;height:400px;width:200px;">School fees for  Term &nbsp;{{$detail->term}} &nbsp; {{date('Y')}}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-4">
                    <div class="font-weight-bold mb-2">Cash/Cheque No:...............................................................</div>
                </div>
                <div class="col-sm-6 mb-4">
                    <div class="font-weight-bold mb-2 text-right">School Fees Balance:<span style="border-bottom:1px dotted;">&nbsp;&nbsp;&nbsp;{{ number_format($detail->balance)}}</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-4">
                    <div class="font-weight-bold mb-2">Shs:&nbsp;<span class="text-muted btn btn-outline-default">{{ number_format($detail->amount_paid)}}</span></div>
                    <span style="font-style:italic; margin-left:30px;">With Thanks</span>
                </div>
                <div class="col-sm-6 mb-4 text-right">
                    <div class="font-weight-bold mb-2">Stamp & Sign:...................................................</div>
                    <span style="font-style:italic; margin-left:30px;">For:</span><span>&nbsp;SAFEWAY JUNIOR SCHOOL.</span><br><span style="margin-left:30px;text-align:center;">KAWEMPE-TTULA</span>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="/fees/print-receipt-now/{{$detail->id}}" target="_blank" class="btn btn-success"><i class="ion ion-md-print"></i>&nbsp; Print</a>
        </div>
    </div>
</div>
