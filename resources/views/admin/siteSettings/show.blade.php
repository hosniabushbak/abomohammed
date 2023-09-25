@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.siteSetting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.site-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.id') }}
                        </th>
                        <td>
                            {{ $siteSetting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.title_ar') }}
                        </th>
                        <td>
                            {{ $siteSetting->title_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.title_en') }}
                        </th>
                        <td>
                            {{ $siteSetting->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.logo') }}
                        </th>
                        <td>
                            @if($siteSetting->logo)
                                <a href="{{ $siteSetting->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $siteSetting->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.icon') }}
                        </th>
                        <td>
                            @if($siteSetting->icon)
                                <a href="{{ $siteSetting->icon->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $siteSetting->icon->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.site_footer') }}
                        </th>
                        <td>
                            {{ $siteSetting->site_footer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.email') }}
                        </th>
                        <td>
                            {{ $siteSetting->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.mobile') }}
                        </th>
                        <td>
                            {{ $siteSetting->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.whatsapp') }}
                        </th>
                        <td>
                            {{ $siteSetting->whatsapp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.telegram') }}
                        </th>
                        <td>
                            {{ $siteSetting->telegram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.instagram') }}
                        </th>
                        <td>
                            {{ $siteSetting->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.youtube') }}
                        </th>
                        <td>
                            {{ $siteSetting->youtube }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.twitter') }}
                        </th>
                        <td>
                            {{ $siteSetting->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.description_ar') }}
                        </th>
                        <td>
                            {{ $siteSetting->description_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.description_en') }}
                        </th>
                        <td>
                            {{ $siteSetting->description_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.key_words_ar') }}
                        </th>
                        <td>
                            {{ $siteSetting->key_words_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteSetting.fields.key_words_en') }}
                        </th>
                        <td>
                            {{ $siteSetting->key_words_en }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.site-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection