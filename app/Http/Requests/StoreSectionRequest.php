<?php

namespace App\Http\Requests;

use App\Models\Section;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSectionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('section_create');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
            'order' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:sections,order',
            ],
            'title_ar' => [
                'string',
                'required',
            ],
            'title_en' => [
                'string',
                'required',
            ],
            'short_info_ar' => [
                'required',
            ],
            'short_info_en' => [
                'required',
            ],
            'text_ar' => [
                'required',
            ],
            'text_en' => [
                'string',
                'required',
            ],
        ];
    }
}
