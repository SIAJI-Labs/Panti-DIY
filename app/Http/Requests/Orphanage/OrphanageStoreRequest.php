<?php

namespace App\Http\Requests\Orphanage;

use Illuminate\Foundation\Http\FormRequest;

class OrphanageStoreRequest extends FormRequest
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
        return [
            'province_id' => ['nullable', 'exists:provinces,id'],
            'regency_id' => ['nullable', 'exists:regencies,id'],
            'district_id' => ['nullable', 'exists:districts,id'],
            'village_id' => ['nullable', 'exists:villages,id'],

            'name' => ['required', 'string', 'max:191'],
            'slug' => ['required', 'string', 'max:191', 'regex:/^[a-z0-9_]+(?:-[_a-z0-9]+)*$/', 'unique:orphanages,slug'],
            'logo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:500'],
            'description' => ['required', 'string']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'slug.regex' => 'The slug format is invalid. Supported format: a-z, 0-9, - (dash) and _ (underscore)',
        ];
    }
}
