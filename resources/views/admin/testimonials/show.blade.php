@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.testimonial.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.testimonials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.id') }}
                        </th>
                        <td>
                            {{ $testimonial->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.name_ar') }}
                        </th>
                        <td>
                            {{ $testimonial->name_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.name_en') }}
                        </th>
                        <td>
                            {{ $testimonial->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.text_ar') }}
                        </th>
                        <td>
                            {{ $testimonial->text_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.text_en') }}
                        </th>
                        <td>
                            {{ $testimonial->text_en }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.testimonials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection