<?php

namespace App\Http\Controllers;

use App\todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(){
        $todos = todo::all();
        return view('todos.index', ['todos' => $todos]);//配列viewのラベル（変数）=>変数
    }
    public function mypage()
    {
        $todos = todo::all();
        return view('todos.mypage', ['todos' => $todos]);
    }
    public function register()
    {
        return view('todos.todocreate');
    }
    public function create(Request $request)
    {
        $request->validate([
            'todo' => 'required|string|min:6',
        ]);

        //　モデルを使って、DBに登録する値をセット
        $todo = new todo;

        $todo->contents = $request->todo; //名前
        $todo->save();

            return redirect('todos/mypage')->with('flash_message', __('Registered.'));

    }
}
