<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'number' => 'required|string|min:8|max:8|unique:cars,number,' . $this->route('car')->id,
            'brand_id' => 'required|exists:brands,id',
            'seats' => 'required|integer|min:1|max:40',
            'year' => 'required|integer|min:1980|max:2025',
            'engine' => 'required|exists:engines,id',
            'owner' => 'required|integer',
        ];
    }
}
