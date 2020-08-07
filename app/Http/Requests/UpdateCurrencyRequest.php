<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateCurrencyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('currency-edit'), Response::HTTP_FORBIDDEN);
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
            'country_name' => 'required',
            'currency_name' => 'required',
            'symbol' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'country_name.required' => 'Country name is required.',
            'currency_name.required' => 'Currency name is required.',
            'symbol.required' => 'Symbol is required.',
        ];
    }
}
