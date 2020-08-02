<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class UpdateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('user-edit'), Response::HTTP_FORBIDDEN);
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
            'email' => ['required', 'email', Rule::unique('admins')->ignore($this->admin_user)],
            'status' => 'required',
            'roles' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'email.required' => 'Email Address Is Required.',
            'email.email' => 'Please Enter A Valid Email Address.',
            'email.unique' => 'The Email Address You Entered Already Exist.',
            'status.required' => 'Status is required',
            'roles.required' => 'Please select a role.'
        ];
    }
}
