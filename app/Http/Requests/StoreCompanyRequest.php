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
     */    public function rules()
    {
        return [
            'name' => 'required|string|max:65',
            'manager_name' => 'required|string|max:32',
            'phone_number' => 'required|numeric|max:11',
            'postal_code' => 'required|numeric|max:7',
            'prefecture_code' => 'required',
            'address' => 'required|string|max:100',
            'mail_address' => 'required|string|max:100',
            'prefix' => 'required|numeric|max:8',
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
            'address' => '住所',
            'mail_address' => 'メールアドレス',
            'prefix' => 'プレフィックス',
        ];
    }
}
