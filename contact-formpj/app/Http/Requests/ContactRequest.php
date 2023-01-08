<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ZipCodeRule;

class ContactRequest extends FormRequest
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
        $data = $this->all();
        // dd($data);
        if (isset($data['postcode']))
            $data['postcode'] = mb_convert_kana($data['postcode'], 'a');
        // dd($data);
        // return $data; 
        $this->merge($data);
        // dd($this);
        // dd($data);
    }
    
    public function rules()
    {       
        return [
            'family_name'=>'required|max:100',
            'first_name'=>'required|max:100',
            'gender'=>'required',
            'email'=>'required|email|max:255',
            'postcode' => ['required', new ZipCodeRule()],
            'address'=>'required|max:255',
            'opinion'=>'required|max:120',
        ];
    }

    public function messages()
    {
        return [
            'family_name.required' => '姓を入力してください',
            'family_name.max:100' => '姓は100文字以内で入力してください',
            'first_name.required' => '名を入力してください',
            'first_name.max:100' => '名は100文字以内で入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'email.max:255' => '255文字以内で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'address.required' => '住所を入力してください',
            'address.max:255' => '255文字以内で入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.max:120' => '120文字以内で入力してください'
        ];
    }


}
