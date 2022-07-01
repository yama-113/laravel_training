<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest{
    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'name' => 'required|max:65',
            'manager_name' => 'required|max:32',
            'phone_number' => 'required',
            'postal_code' => 'required',
            'prefecture_code' => 'required',
            'address' => 'required|max:100',
            'mail_address' => 'required|max:100',
            'prefix' => 'required|max:8',
        ];
    }
}




