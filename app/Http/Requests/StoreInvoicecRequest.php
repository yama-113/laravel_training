<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoicecRequest extends FormRequest
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
            'payment_deadline' => 'required|date|after:today',
            'date_of_issue' => 'required',
            'quotation_no' => 'required',
            'status' => 'required'
        ];
    }
    public function attributes()
    {
        return [
            'title' => '請求名',
            'total' => '金額',
            'payment_deadline' => '支払期限',
            'date_of_issue' => '請求日',
            'quotation_no' => '見積番号',
            'status' => '状態'
        ];
    }
    public function messages()
    {
        return [
            'payment_deadline.after' => '本日以降の日付を指定してください。',
        ];
    }
}
