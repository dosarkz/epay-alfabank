<?php

namespace Dosarkz\EPayAlfaBank\Requests;

use Illuminate\Http\Request;

class DoRegisterRequest extends Request
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
            'userName'              =>  'required',
            'password'              =>  'required',
            'orderNumber'           =>  'required',
            'amount'                =>  'required',
            'returnUrl'             =>  'required'
        ];

    }

}
