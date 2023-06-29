<h4 class="font-weight-bold py-3 mb-0">{{Request()->route()->getName()}}</h4>
<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">{{Request()->route()->getName()}}</li>
    </ol>
</div>