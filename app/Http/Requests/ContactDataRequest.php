<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactDataRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $longitude = $latitude = $value = $whatsapp = ['nullable'];
        $id = $this->segment(3);

        switch(request()->get('type')){
            case 'maps':
                $longitude = ['required', 'unique:contact_data,value,'.$id];
                $latitude = ['required', 'unique:contact_data,value,'.$id];
                break;
            case 'email':
                $value = ['required', 'email', 'max:191', 'unique:contact_data,value,'.$id];
                break;
            case 'phone':
                // Must Start with 08
                $value = ['required', 'regex:/^(08)[0-9]+$/', 'unique:contact_data,value,'.$id];
                break;
            case 'whatsapp':
                // Must Start without 08 at first
                $whatsapp = ['required', 'regex:/^(?!(08))[0-9]*$/', 'unique:contact_data,value,'.$id];
                break;
            case 'email':
                $phone = ['required', 'email', 'max:191', 'unique:contact_data,value,'.$id];
                break;
        }

        return [
            'name' => ['required', 'string', 'max:191'],
            'type' => ['required', 'string', 'in:phone,whatsapp,email,maps'],
            'longitude' => $longitude,
            'latitude' => $latitude,
            'whatsapp' => $whatsapp,
            'value' => $value
        ];
    }
}
