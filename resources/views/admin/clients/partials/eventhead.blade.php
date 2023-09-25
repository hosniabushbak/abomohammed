@foreach ($row->eventheads as $eventhead)
    <span class="badge @if($loop->first) badge-success @else badge-danger @endif">{{$eventhead->title_ar}} </span>
@endforeach
