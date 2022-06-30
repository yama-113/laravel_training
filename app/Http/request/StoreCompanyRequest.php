<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest{
    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            $request->validate[
                'mail_address' => 'required'
            ];
        ];
    }
}




