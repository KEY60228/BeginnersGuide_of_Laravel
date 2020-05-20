<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
    public function index(Request $request) {
        return view('hello.index', [
            'msg' => 'Input below forms.',
        ]);
    }

    public function post(Request $request) {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric | between:0,150',
        ];
        
        $messages = [
            'name.required' => '氏名を入力してください',
            'mail.email' => 'メールアドレスを入力してください',
            'age.numeric' => '年齢を整数で入力してください',
            'age.between' => '年齢は0〜150の間で入力してください',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/hello')->withErrors($validator)->withInput();
        }
        
        return view('hello.index', [
            'msg' => 'Thanks!',
        ]);
    }
}