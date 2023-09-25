@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.section.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sections.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.section.fields.id') }}
                        </th>
                        <td>
                            {{ $section->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.section.fields.image') }}
                        </th>
                        <td>
                            @if($section->image)
                                <a href="{{ $section->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $section->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.section.fields.order') }}
                        </th>
                        <td>
                            {{ $section->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.section.fields.title_ar') }}
                        </th>
                        <td>
                            {{ $section->title_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.section.fields.title_en') }}
                        </th>
                        <td>
                            {{ $section->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.section.fields.short_info_ar') }}
                        </th>
                        <td>
                            {{ $section->short_info_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.section.fields.short_info_en') }}
                        </th>
                        <td>
                            {{ $section->short_info_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.section.fields.text_ar') }}
                        </th>
                        <td>
                            {{ $section->text_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.section.fields.text_en') }}
                        </th>
                        <td>
                            {{ $section->text_en }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sections.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection