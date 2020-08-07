<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateCouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('coupon-edit'), Response::HTTP_FORBIDDEN);
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
            'code' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'discount' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Coupon name is required.',
            'code.required' => 'Code is required.',
            'from_date.required' => 'From Date is required.',
            'to_date.required' => 'To Date is required.',
            'Discount.required' => 'Discount is required.',
            'status.required' => 'Status is required.',
        ];
    }
}
