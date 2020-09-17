<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class DelegateStoreFormRequest extends FormRequest
{
    private $status = ['single', 'married', 'divorce', 'widower'];
    private $driveType = ['motocycle', 'car', 'trocycle'];

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'delegate.fullname'          => 'required|string|max:50',
            'delegate.qualification'     => 'required|string|max:50',
            'delegate.national_id'       => 'required|string|min:14|max:14',
            'delegate.social_status'     => ['required', Rule::in($this->status)],
            'delegate.phone'             => 'required|max:11',
            'delegate.other_phone'       => 'nullable|max:11',
            'delegate.governorate_id'    => 'required|exists:governorates,id',
            'delegate.city_id'           => 'required|exists:cities,id',
            'delegate.address'           => 'required|string',

            'delegateDrive.type'         => ['required', Rule::in($this->driveType)],
            'delegateDrive.color'        => 'required|string|max:20',
            'delegateDrive.plate_number' => 'required|string|max:20',
            'image'                      => 'nullable|mimes:png,jpg,jpeg|max:500',
            'national_image'             => 'nullable|mimes:png,jpg,jpeg|max:500',
        ];
    }



    public function attributes()
    {
        return  trans('custom-attributes.delegate');
    }

    public function validated()
    {

        return  array_merge($this->validator->validated(), [
            'image'          =>  $this->image ?? 'default.png',
            'national_image' =>  $this->national_image ?? 'default.png',
        ]);
    }
}