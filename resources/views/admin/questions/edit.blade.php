@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.question.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questions.update", [$question->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="question_ar">{{ trans('cruds.question.fields.question_ar') }}</label>
                <input class="form-control {{ $errors->has('question_ar') ? 'is-invalid' : '' }}" type="text" name="question_ar" id="question_ar" value="{{ old('question_ar', $question->question_ar) }}" required>
                @if($errors->has('question_ar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question_ar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.question_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="question_en">{{ trans('cruds.question.fields.question_en') }}</label>
                <input class="form-control {{ $errors->has('question_en') ? 'is-invalid' : '' }}" type="text" name="question_en" id="question_en" value="{{ old('question_en', $question->question_en) }}" required>
                @if($errors->has('question_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.question_en_helper') }}</span>
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