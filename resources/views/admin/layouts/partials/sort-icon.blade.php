@if($orderBy['col'] == $col && $orderBy['direction'] == 'asc')
    <i class="fa-solid fa-sort-desc"></i>
@elseif($orderBy['col'] == $col && $orderBy['direction'] == 'desc')
    <i class="fa-solid fa-sort-asc"></i>
@else
    <i class="fa-solid fa-sort"></i>
@endif
