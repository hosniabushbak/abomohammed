@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-2">
                    <div class="card text-white"  style="text-align: center; background-color: #000000">
                        <div class="card-body pb-0">
                            <div class="text-value">{{$user->userClients->count()}}</div>
                            <div>العملاء</div>
                            <br />
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card text-white"  style="text-align: center; background-color: #000000">
                        <div class="card-body pb-0">
                            <div class="text-value">
                                @if($user->username)
                                    <p id="{{$user->id}}" style="display: none" >{{ url('?username='.$user->username) }}</p>
                                    <button class="btn btn-success"  onclick="copy_text_fun({{$user->id}})">Copy</button>
                                @endif
                            </div>
                            <div> رابط الأفلييت </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                @foreach($blocks as $block)
                    <div class="col-md-2">
                        <div class="card text-white"  style="text-align: center; background-color: #000000">
                            <div class="card-body pb-0">
                                <div class="text-value">
                                    {{$block->eventClientEvents()->where('responsive', 0)->where('created_by_id',$user->id)->count()}}
                                </div>
                                <div>{{$block->title}}</div>
                                <br />
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.phone') }}
                        </th>
                        <td>
                            {{ $user->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.username') }}
                        </th>
                        <td>
                            {{ $user->username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\User::TYPE_RADIO[$user->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
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
            <a class="nav-link active" aria-selected="true" href="#user_clients" role="tab" data-toggle="tab">
                {{ trans('cruds.client.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_alerts" role="tab" data-toggle="tab">
                {{ trans('cruds.userAlert.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" role="tabpanel" id="user_clients">
            @includeIf('admin.users.relationships.userClients', ['clients' => $user->userClients])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_alerts">
            @includeIf('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])
        </div>
    </div>
</div>

@endsection
