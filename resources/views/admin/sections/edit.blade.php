@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.section.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sections.update", [$section->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.section.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="order">{{ trans('cruds.section.fields.order') }}</label>
                <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" name="order" id="order" value="{{ old('order', $section->order) }}" step="1" required>
                @if($errors->has('order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_ar">{{ trans('cruds.section.fields.title_ar') }}</label>
                <input class="form-control {{ $errors->has('title_ar') ? 'is-invalid' : '' }}" type="text" name="title_ar" id="title_ar" value="{{ old('title_ar', $section->title_ar) }}" required>
                @if($errors->has('title_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.title_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_en">{{ trans('cruds.section.fields.title_en') }}</label>
                <input class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}" type="text" name="title_en" id="title_en" value="{{ old('title_en', $section->title_en) }}" required>
                @if($errors->has('title_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.title_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_info_ar">{{ trans('cruds.section.fields.short_info_ar') }}</label>
                <textarea class="form-control {{ $errors->has('short_info_ar') ? 'is-invalid' : '' }}" name="short_info_ar" id="short_info_ar" required>{{ old('short_info_ar', $section->short_info_ar) }}</textarea>
                @if($errors->has('short_info_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_info_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.short_info_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_info_en">{{ trans('cruds.section.fields.short_info_en') }}</label>
                <textarea class="form-control {{ $errors->has('short_info_en') ? 'is-invalid' : '' }}" name="short_info_en" id="short_info_en" required>{{ old('short_info_en', $section->short_info_en) }}</textarea>
                @if($errors->has('short_info_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_info_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.short_info_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="text_ar">{{ trans('cruds.section.fields.text_ar') }}</label>
                <textarea class="form-control {{ $errors->has('text_ar') ? 'is-invalid' : '' }}" name="text_ar" id="text_ar" required>{{ old('text_ar', $section->text_ar) }}</textarea>
                @if($errors->has('text_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.text_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="text_en">{{ trans('cruds.section.fields.text_en') }}</label>
                <textarea class="form-control {{ $errors->has('text_en') ? 'is-invalid' : '' }}" name="text_en" id="text_en" required>{{ old('text_ar', $section->text_en) }}</textarea>
                @if($errors->has('text_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.text_en_helper') }}</span>
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
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.sections.storeMedia') }}',
    maxFilesize: 40, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 40,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($section) && $section->image)
      var file = {!! json_encode($section->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
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
