<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuotationRequest extends FormRequest
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
            'title' => 'required|max:64',
            'total' => 'required|max:10',
            'validity_period' => 'required|max:32',
            'due_date' => 'required|after:today',
            'status' => 'required'
        ];
    }
    public function attributes()
    {
        return [
            'title' => '見積名',
            'total' => '金額',
            'validity_period' => '見積書有効期限',
            'due_date' => '納期',
            'status' => '状態'
        ];
    }
    public function messages()
    {
        return [
            'due_date.after' => '本日以降の日付を指定してください。',
        ];
    }
}
