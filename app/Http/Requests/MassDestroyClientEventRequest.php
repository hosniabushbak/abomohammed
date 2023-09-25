<?php

namespace App\Http\Requests;

use App\Models\ClientEvent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClientEventRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('client_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:client_events,id',
        ];
    }
}
