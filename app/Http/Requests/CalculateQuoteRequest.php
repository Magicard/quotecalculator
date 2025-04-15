<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CalculateQuoteRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'distances' => 'required|array|min:1|max:5',
            'distances.*' => 'numeric|min:0',
            'cost_per_mile' => 'required|numeric|min:0',
            'extra_person' => 'boolean',
        ];
    }
}
