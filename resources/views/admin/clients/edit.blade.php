@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.client.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clients.update", [$client->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.client.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $client->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="eventheads">{{ trans('cruds.client.fields.event_head') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('eventheads') ? 'is-invalid' : '' }}" name="eventheads[]" id="eventheads" multiple>
                    @foreach($eventheads as $id => $eventhead)
                        <option value="{{ $id }}" {{ (in_array($id, old('eventheads', [])) || $client->eventheads->contains($id)) ? 'selected' : '' }}>{{ $eventhead }}</option>
                    @endforeach
                </select>
                @if($errors->has('eventheads'))
                    <div class="invalid-feedback">
                        {{ $errors->first('eventheads') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.eventhead_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="arrived">{{ trans('cruds.client.fields.arrived') }}</label>
                <input class="form-control {{ $errors->has('arrived') ? 'is-invalid' : '' }}" type="text" name="arrived" id="arrived" value="{{ old('arrived', $client->arrived) }}">
                @if($errors->has('arrived'))
                    <div class="invalid-feedback">
                        {{ $errors->first('arrived') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.arrived_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.client.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $client->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.client.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $client->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.client.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note', $client->note) }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.note_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required">{{ trans('cruds.client.fields.seriousness') }}</label>
                @foreach(App\Models\Client::SERIOUSNESS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('seriousness') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="seriousness_{{ $key }}" name="seriousness" value="{{ $key }}" {{ old('responsive', $client->seriousness) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="seriousness_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('seriousness'))
                    <div class="invalid-feedback">
                        {{ $errors->first('seriousness') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.seriousness_helper') }}</span>
            </div>


            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.client.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $client->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
