<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteSettingRequest extends FormRequest
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
        $image_validation = ['required', 'mimes:jpg,jpeg,png,svg', 'max:500'];
        if(request()->action[request()->type] == 'update'){
            $image_validation = ['nullable', 'mimes:jpg,jpeg,png,svg', 'max:500'];
        }

        $rules = [
            'title.'.request()->get('type') => ['required', 'string', 'max:191'],
            'description.'.request()->get('type') => ['required', 'string', 'max:191'],
            'logo.'.request()->get('type') => $image_validation,
            'favicon.'.request()->get('type') => $image_validation
        ];

        return $rules;
    }
}
