@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.headSection.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.head-sections.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">{{ trans('cruds.headSection.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.image_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="welcome_text_ar">{{ trans('cruds.headSection.fields.welcome_text_ar') }}</label>
                <input class="form-control {{ $errors->has('welcome_text_ar') ? 'is-invalid' : '' }}" type="text" name="welcome_text_ar" id="welcome_text_ar" value="{{ old('welcome_text_ar', '') }}" required>
                @if($errors->has('welcome_text_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('welcome_text_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.welcome_text_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="welcome_text_en">{{ trans('cruds.headSection.fields.welcome_text_en') }}</label>
                <input class="form-control {{ $errors->has('welcome_text_en') ? 'is-invalid' : '' }}" type="text" name="welcome_text_en" id="welcome_text_en" value="{{ old('welcome_text_en', '') }}" required>
                @if($errors->has('welcome_text_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('welcome_text_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.welcome_text_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="head_text_ar">{{ trans('cruds.headSection.fields.head_text_ar') }}</label>
                <input class="form-control {{ $errors->has('head_text_ar') ? 'is-invalid' : '' }}" type="text" name="head_text_ar" id="head_text_ar" value="{{ old('head_text_ar', '') }}" required>
                @if($errors->has('head_text_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('head_text_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.head_text_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="head_text_en">{{ trans('cruds.headSection.fields.head_text_en') }}</label>
                <input class="form-control {{ $errors->has('head_text_en') ? 'is-invalid' : '' }}" type="text" name="head_text_en" id="head_text_en" value="{{ old('head_text_en', '') }}" required>
                @if($errors->has('head_text_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('head_text_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.head_text_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sup_head_ar">{{ trans('cruds.headSection.fields.sup_head_ar') }}</label>
                <input class="form-control {{ $errors->has('sup_head_ar') ? 'is-invalid' : '' }}" type="text" name="sup_head_ar" id="sup_head_ar" value="{{ old('sup_head_ar', '') }}" required>
                @if($errors->has('sup_head_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sup_head_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.sup_head_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sup_head_en">{{ trans('cruds.headSection.fields.sup_head_en') }}</label>
                <input class="form-control {{ $errors->has('sup_head_en') ? 'is-invalid' : '' }}" type="text" name="sup_head_en" id="sup_head_en" value="{{ old('sup_head_en', '') }}" required>
                @if($errors->has('sup_head_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sup_head_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.sup_head_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sent_text_ar">{{ trans('cruds.headSection.fields.sent_text_ar') }}</label>
                <input class="form-control {{ $errors->has('sent_text_ar') ? 'is-invalid' : '' }}" type="text" name="sent_text_ar" id="sent_text_ar" value="{{ old('sent_text_ar', '') }}" required>
                @if($errors->has('sent_text_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sent_text_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.sent_text_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sent_text_en">{{ trans('cruds.headSection.fields.sent_text_en') }}</label>
                <input class="form-control {{ $errors->has('sent_text_en') ? 'is-invalid' : '' }}" type="text" name="sent_text_en" id="sent_text_en" value="{{ old('sent_text_en', '') }}" required>
                @if($errors->has('sent_text_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sent_text_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.sent_text_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.headSection.fields.start_date') }}</label>
                <input class="form-control datetime {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.headSection.fields.end_date') }}</label>
                <input class="form-control datetime {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="place_ar">{{ trans('cruds.headSection.fields.place_ar') }}</label>
                <input class="form-control {{ $errors->has('place_ar') ? 'is-invalid' : '' }}" type="text" name="place_ar" id="place_ar" value="{{ old('place_ar', '') }}" required>
                @if($errors->has('place_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('place_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.place_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="place_en">{{ trans('cruds.headSection.fields.place_en') }}</label>
                <input class="form-control {{ $errors->has('place_en') ? 'is-invalid' : '' }}" type="text" name="place_en" id="place_en" value="{{ old('place_en', '') }}" required>
                @if($errors->has('place_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('place_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.place_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_ar">{{ trans('cruds.headSection.fields.name_ar') }}</label>
                <input class="form-control {{ $errors->has('name_ar') ? 'is-invalid' : '' }}" type="text" name="name_ar" id="name_ar" value="{{ old('name_ar', '') }}" required>
                @if($errors->has('name_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.name_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_text_ar">{{ trans('cruds.headSection.fields.name_text_ar') }}</label>
                <input class="form-control {{ $errors->has('name_text_ar') ? 'is-invalid' : '' }}" type="text" name="name_text_ar" id="name_text_ar" value="{{ old('name_text_ar', '') }}" required>
                @if($errors->has('name_text_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_text_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.name_text_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_en">{{ trans('cruds.headSection.fields.name_en') }}</label>
                <input class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" type="text" name="name_en" id="name_en" value="{{ old('name_en', '') }}" required>
                @if($errors->has('name_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.name_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_text_en">{{ trans('cruds.headSection.fields.name_text_en') }}</label>
                <input class="form-control {{ $errors->has('name_text_en') ? 'is-invalid' : '' }}" type="text" name="name_text_en" id="name_text_en" value="{{ old('name_text_en', '') }}" required>
                @if($errors->has('name_text_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_text_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.name_text_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email_ar">{{ trans('cruds.headSection.fields.email_ar') }}</label>
                <input class="form-control {{ $errors->has('email_ar') ? 'is-invalid' : '' }}" type="text" name="email_ar" id="email_ar" value="{{ old('email_ar', '') }}" required>
                @if($errors->has('email_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.email_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email_text_ar">{{ trans('cruds.headSection.fields.email_text_ar') }}</label>
                <input class="form-control {{ $errors->has('email_text_ar') ? 'is-invalid' : '' }}" type="text" name="email_text_ar" id="email_text_ar" value="{{ old('email_text_ar', '') }}" required>
                @if($errors->has('email_text_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_text_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.email_text_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email_en">{{ trans('cruds.headSection.fields.email_en') }}</label>
                <input class="form-control {{ $errors->has('email_en') ? 'is-invalid' : '' }}" type="text" name="email_en" id="email_en" value="{{ old('email_en', '') }}" required>
                @if($errors->has('email_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.email_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email_text_en">{{ trans('cruds.headSection.fields.email_text_en') }}</label>
                <input class="form-control {{ $errors->has('email_text_en') ? 'is-invalid' : '' }}" type="text" name="email_text_en" id="email_text_en" value="{{ old('email_text_en', '') }}" required>
                @if($errors->has('email_text_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_text_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.email_text_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile_ar">{{ trans('cruds.headSection.fields.mobile_ar') }}</label>
                <input class="form-control {{ $errors->has('mobile_ar') ? 'is-invalid' : '' }}" type="text" name="mobile_ar" id="mobile_ar" value="{{ old('mobile_ar', '') }}" required>
                @if($errors->has('mobile_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.mobile_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile_text_ar">{{ trans('cruds.headSection.fields.mobile_text_ar') }}</label>
                <input class="form-control {{ $errors->has('mobile_text_ar') ? 'is-invalid' : '' }}" type="text" name="mobile_text_ar" id="mobile_text_ar" value="{{ old('mobile_text_ar', '') }}" required>
                @if($errors->has('mobile_text_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_text_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.mobile_text_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile_en">{{ trans('cruds.headSection.fields.mobile_en') }}</label>
                <input class="form-control {{ $errors->has('mobile_en') ? 'is-invalid' : '' }}" type="text" name="mobile_en" id="mobile_en" value="{{ old('mobile_en', '') }}" required>
                @if($errors->has('mobile_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.mobile_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile_text_en">{{ trans('cruds.headSection.fields.mobile_text_en') }}</label>
                <input class="form-control {{ $errors->has('mobile_text_en') ? 'is-invalid' : '' }}" type="text" name="mobile_text_en" id="mobile_text_en" value="{{ old('mobile_text_en', '') }}" required>
                @if($errors->has('mobile_text_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_text_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.mobile_text_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="note_ar">{{ trans('cruds.headSection.fields.note_ar') }}</label>
                <input class="form-control {{ $errors->has('note_ar') ? 'is-invalid' : '' }}" type="text" name="note_ar" id="note_ar" value="{{ old('note_ar', '') }}" required>
                @if($errors->has('note_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.note_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="note_en">{{ trans('cruds.headSection.fields.note_en') }}</label>
                <input class="form-control {{ $errors->has('note_en') ? 'is-invalid' : '' }}" type="text" name="note_en" id="note_en" value="{{ old('note_en', '') }}" required>
                @if($errors->has('note_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.note_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="button_ar">{{ trans('cruds.headSection.fields.button_ar') }}</label>
                <input class="form-control {{ $errors->has('button_ar') ? 'is-invalid' : '' }}" type="text" name="button_ar" id="button_ar" value="{{ old('button_ar', '') }}" required>
                @if($errors->has('button_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('button_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.button_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="button_en">{{ trans('cruds.headSection.fields.button_en') }}</label>
                <input class="form-control {{ $errors->has('button_en') ? 'is-invalid' : '' }}" type="text" name="button_en" id="button_en" value="{{ old('button_en', '') }}" required>
                @if($errors->has('button_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('button_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.button_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="event_days">عدد أيام الايفنت</label>
                <input class="form-control {{ $errors->has('event_days') ? 'is-invalid' : '' }}" type="text" name="event_days" id="event_days" value="{{ old('event_days', '') }}" required>
                @if($errors->has('event_days'))
                    <div class="invalid-feedback">
                        {{ $errors->first('event_days') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.event_days_helper') }}</span>
            </div>
            {{--            <div class="form-group">--}}
            {{--                <label class="required" for="event_days">عدد أيام الايفنت</label>--}}
            {{--                <input class="form-control {{ $errors->has('event_days') ? 'is-invalid' : '' }}" type="text" name="event_days" id="event_days" value="{{ old('event_days', $headSection->event_days) }}" required>--}}
            {{--                @if($errors->has('event_days'))--}}
            {{--                    <div class="invalid-feedback">--}}
            {{--                        {{ $errors->first('event_days') }}--}}
            {{--                    </div>--}}
            {{--                @endif--}}
            {{--                <span class="help-block">{{ trans('cruds.headSection.fields.event_days_helper') }}</span>--}}
            {{--            </div>--}}
            <div class="form-group">
                <label class="required" for="event_days"> يوم الايفنت والشهر (من)</label>
                <input class="form-control {{ $errors->has('event_from_day') ? 'is-invalid' : '' }}" type="text" name="event_from_day" id="event_from_day" value="{{ old('event_from_day', '') }}" required>
                @if($errors->has('event_from_day'))
                    <div class="invalid-feedback">
                        {{ $errors->first('event_from_day') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.event_from_day_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="event_days"> يوم الايفنت والشهر (إلى)</label>
                <input class="form-control {{ $errors->has('event_to_day') ? 'is-invalid' : '' }}" type="text" name="event_to_day" id="event_to_day" value="{{ old('event_to_day', '') }}" required>
                @if($errors->has('event_to_day'))
                    <div class="invalid-feedback">
                        {{ $errors->first('event_to_day') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.event_to_day_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="event_days">Zoom Details</label>
                <textarea class="form-control {{ $errors->has('zoom_details') ? 'is-invalid' : '' }}" name="zoom_details" id="zoom_details" required>

                </textarea>
                @if($errors->has('zoom_details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zoom_details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.zoom_details_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="zoom_url">رابط الزوم</label>
                <input class="form-control {{ $errors->has('zoom_url') ? 'is-invalid' : '' }}" type="text" name="zoom_url" id="zoom_url" value="" required>
                @if($errors->has('zoom_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zoom_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.zoom_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="zoom_url">رابط التقويم</label>
                <input class="form-control {{ $errors->has('zoom_schedual_url') ? 'is-invalid' : '' }}" type="text" name="zoom_schedual_url" id="zoom_schedual_url" value="" required>
                @if($errors->has('zoom_schedual_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zoom_schedual_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.zoom_schedual_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="zoom_url">Meeting Id</label>
                <input class="form-control {{ $errors->has('meeting_id') ? 'is-invalid' : '' }}" type="text" name="meeting_id" id="meeting_id" value="" required>
                @if($errors->has('meeting_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('meeting_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.meeting_id_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="zoom_url">Passcode</label>
                <input class="form-control {{ $errors->has('passcode') ? 'is-invalid' : '' }}" type="text" name="passcode" id="passcode" value="" required>
                @if($errors->has('passcode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('passcode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.headSection.fields.passcode_helper') }}</span>
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
            url: '{{ route('admin.head-sections.storeMedia') }}',
            maxFilesize: 30, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 30,
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
                @if(isset($headSection) && $headSection->image)
                var file = {!! json_encode($headSection->image) !!}
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
