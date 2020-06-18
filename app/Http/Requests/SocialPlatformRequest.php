<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialPlatformRequest extends FormRequest
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
        // \Log::info($id);
        return [
            'name' => ['required', 'string', 'max:191', 'unique:social_platforms,name,'.$id],
            'description' => ['nullable', 'string', 'max:191'],
            'icon' => ['required', 'string']
        ];
    }
}
