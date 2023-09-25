<?php

namespace App\Http\Requests;

use App\Models\SiteSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSiteSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('site_setting_create');
    }

    public function rules()
    {
        return [
            'title_ar' => [
                'string',
                'required',
            ],
            'title_en' => [
                'string',
                'nullable',
            ],
            'logo' => [
                'required',
            ],
            'site_footer' => [
                'required',
            ],
            'email' => [
                'required',
            ],
            'mobile' => [
                'string',
                'required',
            ],
            'whatsapp' => [
                'string',
                'required',
            ],
            'telegram' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'youtube' => [
                'string',
                'nullable',
            ],
            'twitter' => [
                'string',
                'nullable',
            ],
        ];
    }
}
