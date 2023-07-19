<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'required|string',
            'event_type' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'event_date.required' => 'A event date is required',
            'location.required' => 'A location is required',
            'event_type.required' => 'A event type is required',
        ];
    }


}
