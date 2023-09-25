@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.headSection.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.head-sections.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.id') }}
                        </th>
                        <td>
                            {{ $headSection->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.welcome_text_ar') }}
                        </th>
                        <td>
                            {{ $headSection->welcome_text_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.welcome_text_en') }}
                        </th>
                        <td>
                            {{ $headSection->welcome_text_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.head_text_ar') }}
                        </th>
                        <td>
                            {{ $headSection->head_text_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.head_text_en') }}
                        </th>
                        <td>
                            {{ $headSection->head_text_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.sup_head_ar') }}
                        </th>
                        <td>
                            {{ $headSection->sup_head_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.sup_head_en') }}
                        </th>
                        <td>
                            {{ $headSection->sup_head_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.sent_text_ar') }}
                        </th>
                        <td>
                            {{ $headSection->sent_text_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.sent_text_en') }}
                        </th>
                        <td>
                            {{ $headSection->sent_text_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.start_date') }}
                        </th>
                        <td>
                            {{ $headSection->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.end_date') }}
                        </th>
                        <td>
                            {{ $headSection->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.place_ar') }}
                        </th>
                        <td>
                            {{ $headSection->place_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.place_en') }}
                        </th>
                        <td>
                            {{ $headSection->place_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.name_ar') }}
                        </th>
                        <td>
                            {{ $headSection->name_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.name_text_ar') }}
                        </th>
                        <td>
                            {{ $headSection->name_text_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.name_en') }}
                        </th>
                        <td>
                            {{ $headSection->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.name_text_en') }}
                        </th>
                        <td>
                            {{ $headSection->name_text_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.email_ar') }}
                        </th>
                        <td>
                            {{ $headSection->email_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.email_text_ar') }}
                        </th>
                        <td>
                            {{ $headSection->email_text_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.email_en') }}
                        </th>
                        <td>
                            {{ $headSection->email_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.email_text_en') }}
                        </th>
                        <td>
                            {{ $headSection->email_text_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.mobile_ar') }}
                        </th>
                        <td>
                            {{ $headSection->mobile_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.mobile_text_ar') }}
                        </th>
                        <td>
                            {{ $headSection->mobile_text_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.mobile_en') }}
                        </th>
                        <td>
                            {{ $headSection->mobile_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.mobile_text_en') }}
                        </th>
                        <td>
                            {{ $headSection->mobile_text_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.note_ar') }}
                        </th>
                        <td>
                            {{ $headSection->note_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.note_en') }}
                        </th>
                        <td>
                            {{ $headSection->note_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.button_ar') }}
                        </th>
                        <td>
                            {{ $headSection->button_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headSection.fields.button_en') }}
                        </th>
                        <td>
                            {{ $headSection->button_en }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.head-sections.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection