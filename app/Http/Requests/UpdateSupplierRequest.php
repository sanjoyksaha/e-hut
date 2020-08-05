<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class UpdateSupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('supplier-edit'), Response::HTTP_FORBIDDEN);
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
            'name' => 'required',
            'email' => Rule::unique('suppliers')->ignore($this->supplier),
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Brand name is required.',
            'email.unique' => 'This email is already exists.',
            'status.required' => 'Status is required',
        ];
    }
}
