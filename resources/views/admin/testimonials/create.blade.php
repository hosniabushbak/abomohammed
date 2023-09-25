@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.testimonial.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.testimonials.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name_ar">{{ trans('cruds.testimonial.fields.name_ar') }}</label>
                <input class="form-control {{ $errors->has('name_ar') ? 'is-invalid' : '' }}" type="text" name="name_ar" id="name_ar" value="{{ old('name_ar', '') }}" required>
                @if($errors->has('name_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.name_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_en">{{ trans('cruds.testimonial.fields.name_en') }}</label>
                <input class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" type="text" name="name_en" id="name_en" value="{{ old('name_en', '') }}" required>
                @if($errors->has('name_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.name_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="text_ar">{{ trans('cruds.testimonial.fields.text_ar') }}</label>
                <textarea class="form-control {{ $errors->has('text_ar') ? 'is-invalid' : '' }}" name="text_ar" id="text_ar" required>{{ old('text_ar') }}</textarea>
                @if($errors->has('text_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.text_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="text_en">{{ trans('cruds.testimonial.fields.text_en') }}</label>
                <textarea class="form-control {{ $errors->has('text_en') ? 'is-invalid' : '' }}" name="text_en" id="text_en" required>{{ old('text_en') }}</textarea>
                @if($errors->has('text_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimonial.fields.text_en_helper') }}</span>
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