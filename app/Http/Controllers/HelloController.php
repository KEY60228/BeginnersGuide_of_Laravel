<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
    public function index(Request $request) {
        $validator = Validator::make($request->query(), [
            'id' => 'required',
            'pass' => 'required',
        ]);

        if ($validator->fails()) {
            $msg = 'something wrong in query.';
        } else {
            $msg = 'Thank you, we got your ID and pass.';
        }

        return view('hello.index', [
            'msg' => $msg,
        ]);
    }

    public function post(Request $request) {
        
    }
}