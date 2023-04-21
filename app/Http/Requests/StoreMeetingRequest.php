<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMeetingRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'uuid' => 'required|exists:schedules,uuid',
        ];
    }
}
