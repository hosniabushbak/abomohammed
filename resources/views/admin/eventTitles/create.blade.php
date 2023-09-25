@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.eventTitle.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.event-titles.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.eventTitle.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventTitle.fields.title_helper') }}</span>
            </div>


            <div class="form-group">
                <label class="required" for="mintitle">{{ trans('cruds.eventTitle.fields.mintitle') }}</label>
                <input class="form-control {{ $errors->has('mintitle') ? 'is-invalid' : '' }}" type="text" name="mintitle" id="mintitle" value="{{ old('mintitle', '') }}" required>
                @if($errors->has('mintitle'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mintitle') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventTitle.fields.title_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="order">{{ trans('cruds.section.fields.order') }}</label>
                <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" name="order" id="order" value="{{ old('order', '') }}" step="1" required>
                @if($errors->has('order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.order_helper') }}</span>
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
