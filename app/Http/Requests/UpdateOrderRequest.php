<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
            'car_id' => 'required|exists:cars,id',
            'service_ids' => 'required|array',
            'service_ids.*' => 'exists:services,id',
            'is_closed' => 'sometimes|boolean'
        ];
    }
}
