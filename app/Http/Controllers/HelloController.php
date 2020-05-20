<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index(Request $request) {
        return view('hello.index', [
            'data' => [
                ['name' => 'kenta', 'mail' => 'kenta@com'],
                ['name' => 'pori', 'mail' => 'pori@com'],
                ['name' => 'FUJI', 'mail' => 'FUJI@com'],
                ['name' => 'anesan', 'mail' => 'anesan@com'],
            ],
            'message' => 'Hello!'
        ]);
    }

    public function post(Request $request) {
        $msg = $request->msg;
        return view('hello.index', [
            
        ]);
    }
}
