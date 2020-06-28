<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatisticRequest extends FormRequest
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
        $id = $this->segment(3);
        return [
            'name' => ['required', 'string', 'max:191'],
            'description' => ['nullable', 'string', 'max:191'],
            'value' => ['required', 'string', 'max:191', 'unique:statistics,value,'.$id],
            'prefix' => ['nullable', 'string', 'max:191'],
            'suffix' => ['nullable', 'string', 'max:191'],
            'icon' => ['nullable', 'mimes:png,svg', 'max:1024'],
        ];
    }
}
