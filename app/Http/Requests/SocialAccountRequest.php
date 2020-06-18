<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialAccountRequest extends FormRequest
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
            'platform_id' => ['required', 'exists:social_platforms,id'],
            'name' => ['required', 'string', 'max:191'],
            'link' => ['required', 'string', 'active_url', 'unique:social_accounts,link,'.$id]
        ];
    }

    /**
     * Customizing Message
     * 
     */
    public function messages()
    {
        return [
            'link.active_url' => 'The link is not a valid URL. Try adding protocol (http:// or https://) on beginning of URL'
        ];
    }
}
