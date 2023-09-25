@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                        @if(auth()->user()->orders == 1)
                            <div class="alert alert-danger" role="alert">
                               @lang('global.stopd_account_warning')
                            </div>
                        @endif
                    <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-2">
                                <div class="card text-white"  style="text-align: center; background-color: #000000">
                                    <div class="card-body pb-0">
                                        <div class="text-value">{{$count}}</div>
                                        <div>العملاء</div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-2">
                            <div class="card text-white"  style="text-align: center; background-color: #000000">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{$newcount}}</div>
                                    <div>العملاء الجدد</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                            <div class="col-md-2">
                                <div class="card text-white"  style="text-align: center; background-color: #000000">
                                    <div class="card-body pb-0">
                                        <div class="text-value">
                                        @if(auth()->user()->username)
                                            <p id="{{auth()->user()->id}}" style="display: none" >{{ url('?username='.auth()->user()->username) }}</p>
                                            <button class="btn btn-success"  onclick="copy_text_fun({{auth()->user()->id}})">Copy</button>
                                        @endif
                                        </div>
                                        <div> رابط الأفلييت </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    <div class="row">
                        @foreach($blocks1 as $block)
                        <div class="col-md-2">
                            <div class="card text-white"  style="text-align: center; background-color: #000000">
                                <div class="card-body pb-0">
                                    <div class="text-value">
                                        {{$block->eventClientEvents()->where('responsive', 0)->count()}}
                                    </div>
                                    <div>{{$block->title}}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">

                        <div class="card">
                            <div class="card-header">
                                {{ trans('cruds.client.title_singular') }} {{ trans('global.list') }}
                            </div>

                            <div class="card-body">
                                <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Client">
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
                                        <th>
                                            {{ trans('cruds.client.fields.email') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.client.fields.phone') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.client.fields.note') }}
                                        </th>

                                        <th>
                                            {{ trans('cruds.client.fields.provider') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.client.fields.user') }}
                                        </th>
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
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                        </td>
                                        <td>
                                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                        </td>
                                        <td>
                                            <select class="search">
                                                <option value>{{ trans('global.all') }}</option>
                                                @foreach($head_sections as $key => $item)
                                                    <option value="{{ $item->title }}">{{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                        </td>
                                        <td>
                                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                        </td>
                                        <td>
                                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                        </td>
                                        <td>
                                            <select class="search">
                                                <option value>{{ trans('global.all') }}</option>
                                                @foreach($providers as $key => $item)
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="search">
                                                <option value>{{ trans('global.all') }}</option>
                                                @foreach($users as $key => $item)
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="search">
                                                <option value>{{ trans('global.all') }}</option>
                                                @foreach(App\Models\Client::SERIOUSNESS_RADIO as $key => $item)
                                                    <option value="{{ $key }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script type="text/javascript">
    function copy_text_fun(id) {
        //getting text from P tag
        var copyText = document.getElementById(id);
        // creating textarea of html
        var input = document.createElement("textarea");
        //adding p tag text to textarea
        input.value = copyText.textContent;
        document.body.appendChild(input);
        input.select();
        document.execCommand("Copy");
        // removing textarea after copy
        input.remove();
        // alert(input.value);
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript">
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('client_delete')
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.clients.massDestroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                    return entry.id
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

        let dtOverrideGlobals = {
            buttons: dtButtons,
            processing: true,
            serverSide: true,
            retrieve: true,
            aaSorting: [],
            ajax: "{{ secure_url(URL::route('admin.clients.index', [], false)) }}",
            {{--ajax: "{{ route('admin.clients.index') }}",--}}
            columns: [
                { data: 'placeholder', name: 'placeholder' },
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'event_head', name: 'eventheads.title_ar' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'note', name: 'note' },
                { data: 'provider_name', name: 'provider.name' },
                { data: 'user_name', name: 'user.name' },
                { data: 'seriousness', name: 'seriousness' },
                { data: 'ClientEvents', name: 'ClientEvents' },
                { data: 'actions', name: '{{ trans('global.actions') }}' }
            ],
            orderCellsTop: true,
            order: [[ 8, 'desc' ]],
            pageLength: 50,
        };
        let table = $('.datatable-Client').DataTable(dtOverrideGlobals);
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

        let visibleColumnsIndexes = null;
        $('.datatable thead').on('input', '.search', function () {
            let strict = $(this).attr('strict') || false
            let value = strict && this.value ? "^" + this.value + "$" : this.value

            let index = $(this).parent().index()
            if (visibleColumnsIndexes !== null) {
                index = visibleColumnsIndexes[index]
            }

            table
                .column(index)
                .search(value, strict)
                .draw()
        });
        table.on('column-visibility.dt', function(e, settings, column, state) {
            visibleColumnsIndexes = []
            table.columns(":visible").every(function(colIdx) {
                visibleColumnsIndexes.push(colIdx);
            });
        })
    });

</script>
@endsection
