<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Myrule;

class HelloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'hello') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'mail' => 'email',
            'age' => ['numeric', new Myrule(5)],
        ];
    }

    public function messages() {
        return [
            'name.required' => '氏名を入力してください',
            'mail.email' => 'メールアドレスを入力してください',
            'age.numeric' => '年齢を整数で入力してください',
            'age.hello' => 'Hello! Please input your age in EVEN number!',
        ];
    }
}
