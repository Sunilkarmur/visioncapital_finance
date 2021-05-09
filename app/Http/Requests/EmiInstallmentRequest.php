<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmiInstallmentRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'finance_type' => session()->has('finance_type')?session('finance_type'):null,
        ]);
    }
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
            'finance_id'=>'required|exists:finance_forms,id',
            'account_id'=>'required|exists:loan_accounts,account_id',
            'finance_type'=>'required',
            'instalment_date'=>'required|date',
            'paid_date'=>'required|date',
            'instalment_amount'=>'required',
            'paid_amount'=>'required',
            'remarks'=>'required',
        ];
    }


    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ((float)$this->paid_amount<(float)$this->instalment_amount){
                $validator->errors()->add('paid_amount', 'Invalid Paid Amount!');
            }
        });
    }
}
