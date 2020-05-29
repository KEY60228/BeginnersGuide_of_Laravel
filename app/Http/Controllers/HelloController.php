<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Person;

class HelloController extends Controller
{
    public function index(Request $request) {
        $items = DB::table('people')->orderBy('age', 'asc')->simplePaginate(5);
   
        return view('hello.index', [
            'items' => $items,
        ]);
    }

    public function post(Request $request) {
        $items = DB::select('SELECT * FROM people');
        return view('hello.index', [
            'items' => $items,
        ]);
    }

    public function add(Request $request) {
        return view('hello.add');
    }

    public function create(Request $request) {
        $params = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ]; 

        DB::table('people')->insert($params);

        return redirect('/hello');
    }

    public function edit(Request $request) {
        $params = [
            'id' => $request->id,
        ];
        $item = DB::table('people')->where('id', $request->id)->first();
        
        return view('hello.edit', [
            'form' => $item,
        ]);
    }

    public function update(Request $request) {
        $params = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')->where('id', $params['id'])->update($params);
        
        return redirect('/hello');
    }

    public function del(Request $request) {
        $params = [
            'id' => $request->id,
        ];
        $item = DB::table('people')->where('id', $params['id'])->first();
        
        return view('hello.del', [
            'form' => $item,
        ]);
    }

    public function remove(Request $request) {
        $params = [
            'id' => $request->id
        ];
        DB::table('people')->where('id', $params['id'])->delete();
        
        return redirect('/hello');
    }

    public function show (Request $request) {
        $page = $request->page;
        $items = DB::table('people')->offset($page * 2)->limit(2)->get();
        
        return view('hello.show', [
            'items' => $items,
        ]);
    }

    public function rest (Request $request) {
        return view('hello.rest');
    }

    public function ses_get(Request $request) {
        $sesdata = $request->session()->get('msg');
        return view('hello.session', [
            'session_data' => $sesdata,
        ]);
    }

    public function ses_put(Request $request) {
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return redirect('/hello/session');
    }
}