<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request) {
        $items = DB::table('people')->get();
   
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

        DB::insert('INSERT INTO people (name, mail, age) VALUES (:name, :mail, :age)', $params);

        return redirect('/hello');
    }

    public function edit(Request $request) {
        $params = [
            'id' => $request->id,
        ];
        $item = DB::select('SELECT * FROM people WHERE id = :id', $params);
        
        return view('hello.edit', [
            'form' => $item[0],
        ]);
    }

    public function update(Request $request) {
        $params = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::update('UPDATE people SET name = :name, mail = :mail, age = :age WHERE id = :id', $params);
        
        return redirect('/hello');
    }

    public function del(Request $request) {
        $params = [
            'id' => $request->id,
        ];
        $item = DB::select('SELECT * FROM people WHERE id = :id', $params);
        
        return view('hello.del', [
            'form' => $item[0],
        ]);
    }

    public function remove(Request $request) {
        $params = [
            'id' => $request->id
        ];
        DB::DELETE('DELETE FROM people WHERE id = :id', $params);
        
        return redirect('/hello');
    }

    public function show (Request $request) {
        $page = $request->page;
        $items = DB::table('people')->offset($page * 2)->limit(2)->get();
        
        return view('hello.show', [
            'items' => $items,
        ]);
    }
}