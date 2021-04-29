<?php

namespace App\Http\Requests;

use App\Helpers\Helper;
use App\Models\Wallet;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoanProcessionRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'finance_id' => decrypt($this->id),
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
            'finance_type'=>'required',
            'disbursement_amt'=>'required'
        ];
    }


    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            if ((float)$this->disbursement_amt<100){
                $validator->errors()->add('disbursement_amt', 'Disbursement Amount more than 100 !');
            }

            if (!$this->checkLoanBalance()){
                $validator->errors()->add('disbursement_amt', 'Insuffician Balance!');
            }
        });
    }

    public function checkLoanBalance(){
        $wallet = Wallet::where([['type', session('finance_type')],['status', '1']])
            ->where('amount','>=',(float)$this->disbursement_amt)
            ->first();
        return $wallet?true:false;
    }



    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response["status"] = false;
        $response["code"] = 422;
        $response["message"] = $validator->errors()->first();
        $response["data"] = $validator->errors()->messages();

        $response = response()->json($response,422);
        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
