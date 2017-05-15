<?php

namespace Dosarkz\EPayAlfaBank\Requests;

use Illuminate\Http\Request;

class PaymentOrderBindingDoRequest extends Request
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
            'mdOrder'               =>  'required',
            'bindingId'             =>  'required',
            'ip'                    =>  'required'
        ];

    }

}
