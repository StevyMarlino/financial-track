<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomainStoreRequest extends FormRequest
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
     * @return \string[][]
     */
    public function rules()
    {

      return [
            'name_host' => ['required', 'string','bail'],
            'name_customer' => ['required','string','bail'],
            'price' => ['required','in:10000,15000,20000,25000,30000,40000,50000','bail'],
            'service' => ['required','in:SMS,RENEW,REGISTER','bail'],
            'type' => ['required','in:STARTER,BUSINESS,PREMIUM,ULTIMATE','bail'],
            'method_payment' => ["required","in:ORANGE MONEY,MTN MONEY,CASH",'bail']
        ];
    }
}
