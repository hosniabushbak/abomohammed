@can('client_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.clients.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.client.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.client.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userClients">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.client.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.event_head') }}
                        </th>
{{--                        <th>--}}
{{--                            {{ trans('cruds.client.fields.arrived') }}--}}
{{--                        </th>--}}
                        <th>
                            {{ trans('cruds.client.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.note') }}
                        </th>
{{--                        <th>--}}
{{--                            {{ trans('cruds.client.fields.user') }}--}}
{{--                        </th>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.user.fields.email') }}--}}
{{--                        </th>--}}
                        <th>
                            {{ trans('cruds.client.fields.seriousness') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientEvent.title_singular') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $key => $client)
                        <tr data-entry-id="{{ $client->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $loop->iteration ?? '' }}

                            </td>
                            <td>
                                {{ $client->name ?? '' }}
                            </td>
{{--                            <td>--}}
{{--                                {{ $client->arrived ?? '' }}--}}
{{--                            </td>--}}

                            <td>
                                @foreach($client->eventheads as $key => $item)
                                    <span class="badge badge-info">{{ $item->title_ar }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $client->email ?? '' }}
                            </td>
                            <td>
                                {{ $client->phone ?? '' }}
                            </td>
                            <td>
                                {{ $client->note ?? '' }}
                            </td>
{{--                            <td>--}}
{{--                                {{ $client->user->name ?? '' }}--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{ $client->user->email ?? '' }}--}}
{{--                            </td>--}}
                            <td>
                                <a href="#" data-path="{{ url('admin/clients/EditSeirsWithModel/'.$client->id) }}"
                                   class="load-ajax-modal">
                                    @if($client->seriousness == 0)
                                        <span class="badge badge-dark">
                                            None
                                        </span>
                                    @elseif($client->seriousness == 1)
                                        <span class="badge badge-primary">
                                            Cold
                                        </span>
                                    @elseif($client->seriousness == 2)
                                        <span class="badge badge-warning">
                                               Warm
                                        </span>
                                    @elseif($client->seriousness == 3)
                                        <span class="badge badge-success">
                                                Hot
                                        </span>
                                    @endif
                                </a>
                            </td>
                            <td>
                                <table>
                                    @foreach($client->clientClientEvents as $key => $value)
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
                                        $arr = $client->clientClientEvents->pluck('event_id')->toArray();
                                        $arr=$arr;
                                        $titlesi = \App\Models\EventTitle::whereNotIn('id', $arr)->get();
                                        ?>
                                    @foreach($titlesi as  $item)
                                        <td>
                                            <a href="#" data-path="{{ url('admin/client-events/CreatewithMod/'.$item->id.'/'.$client->id) }}"
                                               class="load-ajax-modal">
                                        <span class="badge
                                        badge-dark">
                                        {{ $item->mintitle }}
                                        </span>
                                            </a>
                                        </td>
                                        @endforeach
                                        </td>
                                </table>
                            </td>

                            <td>
                                @can('client_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.clients.show', $client->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('client_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.clients.edit', $client->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('client_delete')
                                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('client_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.clients.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    // order: [[ 8, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-userClients:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
