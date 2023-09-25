@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clientEvent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.client-events.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clientEvent.fields.id') }}
                        </th>
                        <td>
                            {{ $clientEvent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientEvent.fields.event') }}
                        </th>
                        <td>
                            {{ $clientEvent->event->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientEvent.fields.date') }}
                        </th>
                        <td>
                            {{ $clientEvent->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientEvent.fields.text') }}
                        </th>
                        <td>
                            {{ $clientEvent->text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientEvent.fields.responsive') }}
                        </th>
                        <td>
                            {{ App\Models\ClientEvent::RESPONSIVE_RADIO[$clientEvent->responsive] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientEvent.fields.note') }}
                        </th>
                        <td>
                            {{ $clientEvent->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientEvent.fields.client') }}
                        </th>
                        <td>
                            {{ $clientEvent->client->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.client-events.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
