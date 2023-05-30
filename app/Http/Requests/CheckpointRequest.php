<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'location' => ['required', 'string'],
            'comment' => ['required', 'string', 'min:3'],
            'image' => ['required', 'file', 'max:2048'],
            'banknote_id' => ['required'],
        ];
    }
}