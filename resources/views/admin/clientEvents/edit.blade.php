@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.clientEvent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.client-events.update", [$clientEvent->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="event_id">{{ trans('cruds.clientEvent.fields.event') }}</label>
                <select class="form-control select2 {{ $errors->has('event') ? 'is-invalid' : '' }}" name="event_id" id="event_id" required>
                    @foreach($events as $id => $entry)
                        <option value="{{ $id }}" {{ (old('event_id') ? old('event_id') : $clientEvent->event->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('event'))
                    <div class="invalid-feedback">
                        {{ $errors->first('event') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clientEvent.fields.event_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.clientEvent.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $clientEvent->date) }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clientEvent.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="text">{{ trans('cruds.clientEvent.fields.text') }}</label>
                <textarea class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}" name="text" id="text">{{ old('text', $clientEvent->text) }}</textarea>
                @if($errors->has('text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clientEvent.fields.text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.clientEvent.fields.responsive') }}</label>
                @foreach(App\Models\ClientEvent::RESPONSIVE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('responsive') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="responsive_{{ $key }}" name="responsive" value="{{ $key }}" {{ old('responsive', $clientEvent->responsive) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="responsive_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('responsive'))
                    <div class="invalid-feedback">
                        {{ $errors->first('responsive') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clientEvent.fields.responsive_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.clientEvent.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note', $clientEvent->note) }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clientEvent.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="client_id">{{ trans('cruds.clientEvent.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $clientEvent->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clientEvent.fields.client_helper') }}</span>
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