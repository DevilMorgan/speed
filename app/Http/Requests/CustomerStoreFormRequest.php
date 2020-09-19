<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {

        $this->merge([

            'admin' => array_merge(
                $this->get('admin'),
                [
                    'is_active' => isset($this->is_active) ? 1 : 0,
                    'password'  => bcrypt($this->password),
                    'type'      => 'customer',
                ]
            ),
        ]);
    }
    public function rules()
    {
        return [

            'admin.is_active'              => 'nullable',
            'admin.phone'                  => 'required|unique:admins,phone',
            'admin.fullname'               => 'required|string|max:50',
            'admin.user_name'              => 'required|string|unique:admins,user_name|max:20',
            'admin.password'               => 'nullable',
            'admin.type'                   => 'nullable',
            'admin.email'                  => 'required|email|unique:admins,email',
            'password'                     => 'required|confirmed|min:6',
            'password_confirmation'        => 'required|same:password',

            'customer.governorate_id'      => 'required|exists:governorates,id',
            'customer.city_id'             => 'required|exists:cities,id',
            'customer.company_name'        => 'nullable|string|max:50',
            'customer.other_phone'         => 'nullable|unique:customers,other_phone',
            'customer.facebook_page'       => 'nullable|string',
            // 'customer.notes'               => 'nullable|string',
            'customer.contract_type'       => 'required|in:daily,monthly',
            'image'                        => 'nullable|mimes:png,jpg,jpeg|max:500',

            'customerInfo.address'         => 'required|string',
            'customerInfo.special_marque'  => 'required|string|max:100',
            'customerInfo.house_number'    => 'required|string|max:10',
            'customerInfo.door_number'     => 'required|string|max:10',
            'customerInfo.shaka_number'    => 'required|string|max:10',
            'customerInfo.activity'        => 'required|string',

        ];
    }



    public function attributes()
    {
        return  trans('custom-attributes');
    }

    public function validated()
    {

        return array_merge($this->validator->validated(), [
            'image'  =>  $this->image ?? 'default.png',
        ]);

    }
}
