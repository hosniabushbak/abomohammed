<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.client.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clients.update", [$client->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="hidden" name="name" id="name" value="{{ old('name', $client->name) }}" required>
            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="hidden" name="email" id="email" value="{{ old('email', $client->email) }}" required>
            <input class="form-control {{ $errors->has('user_id') ? 'is-invalid' : '' }}" type="hidden" name="user_id" id="user_id" value="{{ old('user_id', $client->user_id) }}" required>
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
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

