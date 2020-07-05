<?php

namespace App\Http\Requests\Orphanage;

use Illuminate\Foundation\Http\FormRequest;

class PersonInChargeUpdateRequest extends FormRequest
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
        // Get ID from Route
        $id = $this->orphanage_pic;
        $contact = $mobile = $whatsapp = ['nullable'];
        
        switch(request()->get('type')){
            case 'email':
                $contact = ['required', 'email', 'max:191', 'unique:orphanage_pics,contact,'.$id];
                break;
            case 'mobile':
                $mobile = ['required', 'unique:orphanage_pics,contact,'.$id];
                break;
            case 'whatsapp':
                // Must Start without 08 at first
                $whatsapp = ['required', 'regex:/^(?!(08))[0-9]*$/', 'unique:orphanage_pics,contact,'.$id];
                break;
            default: 
                $contact = ['required', 'string', 'max:191', 'unique:orphanage_pics,contact,'.$id];
                break;
        }

        return [
            'orphanage_id' => ['required', 'exists:orphanages,id'],
            'name' => ['required', 'string', 'max:191'],
            'type' => ['required', 'string', 'in:phone,whatsapp,mobile,email,address'],
            'contact' => $contact,
            'whatsapp' => $whatsapp,
            'mobile' => $mobile
        ];
    }
}
