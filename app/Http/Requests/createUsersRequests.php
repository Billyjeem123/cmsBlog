<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class createUsersRequests extends Request
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
            //
            'name' => 'required',
            'email' => 'required',
            'pword' => 'required',
            'status' => 'required',
            'role' => 'required',
        ];
    }
}
