<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
    public function prepareForValidation()
    {
        $pref = true;
        if(!is_null($this->prefecture_code)){
            $pref = array_key_exists($this->prefecture_code, config('prefectures'));
        }
        $this->merge([
            'phone_number' => str_replace('-', '', $this->phone_number),
            'postal_code' => str_replace('-', '', $this->postal_code),
            'prefecture_code_check' => $pref,
        ]);
    }
    public function rules()
    {
        return [
            // 0が並ぶものはintegerではじかれるためnumeric（電話番号、郵便番号、prefix）
            'name' => 'required|string|max:65',
            'manager_name' => 'required|string|max:32',
            'phone_number' => 'required|numeric|digits_between:1,11',
            'postal_code' => 'required|numeric|digits_between:1,7',
            'prefecture_code' => 'required',
            'prefecture_code_check' => 'accepted',
            'address' => 'required|string|max:100',
            'mail_address' => 'required|string|email:rfc,dns|max:100',
            'prefix' => 'required|numeric|digits_between:1,8|unique:companies,prefix',
        ];
    }
    public function attributes()
    {
        return [
            'name' => '会社名',
            'manager_name' => '担当者名',
            'phone_number' => '電話番号',
            'postal_code' => '郵便番号',
            'prefecture_code' => '都道府県',
            'prefecture_code_check' => '都道府県',
            'address' => '住所',
            'mail_address' => 'メールアドレス',
            'prefix' => 'プレフィックス',
        ];
    }
    public function messages()
    {
        return [
            'mail_address.email' => ':attributeは正確にご記入ください。',
            'prefix.unique' => 'ご指定のプレフィックスは既に登録されています。',
            'prefecture_code_check.accepted' => '都道府県は選択肢の中から選択してください。'
        ];
    }
}
