<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;

class HelloController extends Controller
{
    public function index(Request $request) {
        return view('hello.index', [
            'msg' => 'input below forms.'
        ]);
    }

    public function post(HelloRequest $request) {
        return view('hello.index', [
            'msg' => 'Thanks!!',
        ]);
    }
}
