<?php

namespace App\Http\Requests;

use App\Models\ClientEvent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientEventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_event_create');
    }

    public function rules()
    {
        return [
            'event_id' => [
                'required',
                'integer',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'responsive' => [
                'required',
            ],
            'client_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
