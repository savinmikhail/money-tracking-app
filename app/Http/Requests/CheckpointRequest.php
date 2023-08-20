<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CheckpointRequest extends FormRequest
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
            'ltd' => ['required', 'string'],
            'lng' => ['required', 'string'],
            'comment' => ['required', 'string', 'min:3'],
            'image' => ['required', 'file', 'max:2048'],
            'date' => ['required', 'date'],
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'longitude' => 'Longitude is required',
            'latitude' => 'Latitude is required',
            'comment' => 'Comment is required, min 5 symbols'
        ];
    }
}
