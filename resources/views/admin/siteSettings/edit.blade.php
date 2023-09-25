@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.siteSetting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.site-settings.update", [$siteSetting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title_ar">{{ trans('cruds.siteSetting.fields.title_ar') }}</label>
                <input class="form-control {{ $errors->has('title_ar') ? 'is-invalid' : '' }}" type="text" name="title_ar" id="title_ar" value="{{ old('title_ar', $siteSetting->title_ar) }}" required>
                @if($errors->has('title_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.title_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_en">{{ trans('cruds.siteSetting.fields.title_en') }}</label>
                <input class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}" type="text" name="title_en" id="title_en" value="{{ old('title_en', $siteSetting->title_en) }}">
                @if($errors->has('title_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.title_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="logo">{{ trans('cruds.siteSetting.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icon">{{ trans('cruds.siteSetting.fields.icon') }}</label>
                <div class="needsclick dropzone {{ $errors->has('icon') ? 'is-invalid' : '' }}" id="icon-dropzone">
                </div>
                @if($errors->has('icon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.icon_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="site_footer">{{ trans('cruds.siteSetting.fields.site_footer') }}</label>
                <textarea class="form-control {{ $errors->has('site_footer') ? 'is-invalid' : '' }}" name="site_footer" id="site_footer" required>{{ old('site_footer', $siteSetting->site_footer) }}</textarea>
                @if($errors->has('site_footer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_footer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.site_footer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.siteSetting.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $siteSetting->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile">{{ trans('cruds.siteSetting.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', $siteSetting->mobile) }}" required>
                @if($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="whatsapp">{{ trans('cruds.siteSetting.fields.whatsapp') }}</label>
                <input class="form-control {{ $errors->has('whatsapp') ? 'is-invalid' : '' }}" type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $siteSetting->whatsapp) }}" required>
                @if($errors->has('whatsapp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('whatsapp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.whatsapp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telegram">{{ trans('cruds.siteSetting.fields.telegram') }}</label>
                <input class="form-control {{ $errors->has('telegram') ? 'is-invalid' : '' }}" type="text" name="telegram" id="telegram" value="{{ old('telegram', $siteSetting->telegram) }}">
                @if($errors->has('telegram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telegram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.telegram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telegram_title_ar">{{ trans('cruds.siteSetting.fields.telegram_title_ar') }}</label>
                <input class="form-control {{ $errors->has('telegram_title_ar') ? 'is-invalid' : '' }}" type="text" name="telegram_title_ar" id="telegram_title_ar" value="{{ old('telegram_title_ar', $siteSetting->telegram_title_ar) }}">
                @if($errors->has('telegram_title_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telegram_title_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.telegram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telegram_title_en">{{ trans('cruds.siteSetting.fields.telegram_title_en') }}</label>
                <input class="form-control {{ $errors->has('telegram_title_en') ? 'is-invalid' : '' }}" type="text" name="telegram_title_en" id="telegram_title_en" value="{{ old('telegram_title_en', $siteSetting->telegram_title_en) }}">
                @if($errors->has('telegram_title_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telegram_title_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.telegram_helper') }}</span>
            </div>


            <div class="form-group">
                <label for="instagram">{{ trans('cruds.siteSetting.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', $siteSetting->instagram) }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube">{{ trans('cruds.siteSetting.fields.youtube') }}</label>
                <input class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" type="text" name="youtube" id="youtube" value="{{ old('youtube', $siteSetting->youtube) }}">
                @if($errors->has('youtube'))
                    <div class="invalid-feedback">
                        {{ $errors->first('youtube') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.youtube_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.siteSetting.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', $siteSetting->twitter) }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_ar">{{ trans('cruds.siteSetting.fields.description_ar') }}</label>
                <textarea class="form-control {{ $errors->has('description_ar') ? 'is-invalid' : '' }}" name="description_ar" id="description_ar">{{ old('description_ar', $siteSetting->description_ar) }}</textarea>
                @if($errors->has('description_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.description_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_en">{{ trans('cruds.siteSetting.fields.description_en') }}</label>
                <textarea class="form-control {{ $errors->has('description_en') ? 'is-invalid' : '' }}" name="description_en" id="description_en">{{ old('description_en', $siteSetting->description_en) }}</textarea>
                @if($errors->has('description_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.description_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="key_words_ar">{{ trans('cruds.siteSetting.fields.key_words_ar') }}</label>
                <textarea class="form-control {{ $errors->has('key_words_ar') ? 'is-invalid' : '' }}" name="key_words_ar" id="key_words_ar">{{ old('key_words_ar', $siteSetting->key_words_ar) }}</textarea>
                @if($errors->has('key_words_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('key_words_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.key_words_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="key_words_en">{{ trans('cruds.siteSetting.fields.key_words_en') }}</label>
                <textarea class="form-control {{ $errors->has('key_words_en') ? 'is-invalid' : '' }}" name="key_words_en" id="key_words_en">{{ old('key_words_en', $siteSetting->key_words_en) }}</textarea>
                @if($errors->has('key_words_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('key_words_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.key_words_en_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.site-settings.storeMedia') }}',
    maxFilesize: 2000, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2000,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($siteSetting) && $siteSetting->logo)
      var file = {!! json_encode($siteSetting->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.iconDropzone = {
    url: '{{ route('admin.site-settings.storeMedia') }}',
    maxFilesize: 2000, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2000,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="icon"]').remove()
      $('form').append('<input type="hidden" name="icon" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="icon"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($siteSetting) && $siteSetting->icon)
      var file = {!! json_encode($siteSetting->icon) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="icon" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection
