@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.serviceProvider.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.service-providers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceProvider.fields.id') }}
                        </th>
                        <td>
                            {{ $serviceProvider->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceProvider.fields.name') }}
                        </th>
                        <td>
                            {{ $serviceProvider->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceProvider.fields.slug') }}
                        </th>
                        <td>
                            {{ $serviceProvider->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceProvider.fields.active') }}
                        </th>
                        <td>
                            {{ App\Models\ServiceProvider::ACTIVE_RADIO[$serviceProvider->active] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.service-providers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#provider_clients" role="tab" data-toggle="tab">
                {{ trans('cruds.client.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="provider_clients">
            @includeIf('admin.serviceProviders.relationships.providerClients', ['clients' => $serviceProvider->providerClients])
        </div>
    </div>
</div>

@endsection