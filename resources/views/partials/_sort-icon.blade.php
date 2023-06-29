@if($sortBy !== $field)
<i class="text-muted fa fa-sort"></i>
@elseif($sortDirection == 'asc')
<i class="color:rgbs(38, 38, 236, 0.774)" class="fa fa-sort-up"></i>
@else 
<i class="color:rgbs(38, 38, 236, 0.774)" class="fa fa-sort-down"></i>
@endif