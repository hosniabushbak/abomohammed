<?php

namespace App\Http\Requests;

use App\Models\HeadSection;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHeadSectionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('head_section_edit');
    }

    public function rules()
    {
        return [
            'welcome_text_ar' => [
                'string',
                'required',
            ],
            'welcome_text_en' => [
                'string',
                'required',
            ],
            'head_text_ar' => [
                'string',
                'required',
            ],
            'head_text_en' => [
                'string',
                'required',
            ],
            'sup_head_ar' => [
                'string',
                'required',
            ],
            'sup_head_en' => [
                'string',
                'required',
            ],
            'sent_text_ar' => [
                'string',
                'required',
            ],
            'sent_text_en' => [
                'string',
                'required',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'place_ar' => [
                'string',
                'required',
            ],
            'place_en' => [
                'string',
                'required',
            ],
            'name_ar' => [
                'string',
                'required',
            ],
            'name_text_ar' => [
                'string',
                'required',
            ],
            'name_en' => [
                'string',
                'required',
            ],
            'name_text_en' => [
                'string',
                'required',
            ],
            'email_ar' => [
                'string',
                'required',
            ],
            'email_text_ar' => [
                'string',
                'required',
            ],
            'email_en' => [
                'string',
                'required',
            ],
            'email_text_en' => [
                'string',
                'required',
            ],
            'mobile_ar' => [
                'string',
                'required',
            ],
            'mobile_text_ar' => [
                'string',
                'required',
            ],
            'mobile_en' => [
                'string',
                'required',
            ],
            'mobile_text_en' => [
                'string',
                'required',
            ],
            'note_ar' => [
                'string',
                'required',
            ],
            'note_en' => [
                'string',
                'required',
            ],
            'button_ar' => [
                'string',
                'required',
            ],
            'button_en' => [
                'string',
                'required',
            ],
        ];
    }
}
