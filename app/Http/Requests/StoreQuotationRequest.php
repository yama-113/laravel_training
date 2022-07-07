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
    public function prepareForValidation()
    {
        $this->merge([
            'total' => mb_convert_kana($this->total,"n"),
            'status' => (array_key_exists($this->status, config('status'))) ? $this->status : false
        ]);
    }
    public function rules()
    {
        return [
            'title' => 'required|string|max:64',
            'total' => 'required|numeric|max:10',
            'validity_period' => 'required|date|max:32',
            'due_date' => 'required|date|after:today',
            'status' => 'required|accepted'
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
            'status.accepted' => '状態は選択肢の中から選択してください。'
        ];
    }
}
