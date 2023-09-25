@if($row->provider_id)
{{$row->provider ? $row->provider->name : ''}}
@else
من خلال الصفحة
@endif
