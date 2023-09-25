<?php

namespace App\Http\Requests;

use App\Models\EventTitle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEventTitleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_title_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
