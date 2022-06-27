<?php

namespace App\Http\Requests\Member\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
				'required',
	            'string',
            ],
	        'email' => [
				'required',
		        'email',
	        ],
	        'password' => [
				'required',
		        'confirmed',
		        'min:4',
	        ]
        ];
    }
}
