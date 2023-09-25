<table>
    @foreach($row->clientClientEvents as $key => $value)
        <td>

            @if($value->responsive == 0)
                <a href="#" data-path="{{ url('admin/client-events/withMod/'.$value->id) }}"
                   class="load-ajax-modal">
                                            <span class="badge badge-success">
                                                {{ $value->event->mintitle  }}
                                            </span>
                </a>
            @elseif($value->responsive == 1)
                <a href="#" data-path="{{ url('admin/client-events/withMod/'.$value->id) }}"
                   class="load-ajax-modal">
                                            <span class="badge badge-danger">
                                                {{ $value->event->mintitle }}
                                            </span>
                </a>
            @elseif($value->responsive == 2)
                <a href="#" data-path="{{ url('admin/client-events/withMod/'.$value->id) }}"
                   class="load-ajax-modal">
                                            <span class="badge badge-warning">
                                                {{ $value->event->mintitle }}
                                            </span>
                </a>
            @endif
        </td>

    @endforeach


    <?php
    $arr = $row->clientClientEvents->pluck('event_id')->toArray();
    $arr=$arr;
    $titlesi = \App\Models\EventTitle::whereNotIn('id', $arr)->get();
    ?>
    @foreach($titlesi as  $item)
        <td>
            <a href="#" data-path="{{ url('admin/client-events/CreatewithMod/'.$item->id.'/'.$row->id) }}"
               class="load-ajax-modal">
                                        <span class="badge
                                        badge-dark">
                                        {{ $item->mintitle }}
                                        </span>
            </a>
        </td>
        @endforeach

</table>
