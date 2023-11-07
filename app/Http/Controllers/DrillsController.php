<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Drill;

class DrillsController extends Controller
{
    public function index()
    {
        $drills = Drill::all();
//        第二引数でkeyに指定したものがviewで変数として取り出せる
        return view('drills.index', ['drills' => $drills]);
    }
        public function new()
    {
        return view('drills.new');
    }
    public function create(Request $request)//リクエストの値が$requestに入ってくるエラーがあったら、呼び出し元にリダイレクトしてくれる
    {
        $request->validate([
           'title' => 'required|string|max:255',
           'category_name' => 'required|string|max:255',
           'problem0' =>  'required|string|max:255',
           'problem1'=> 'string|nullable|max:255',
           'problem2'=> 'string|nullable|max:255',
           'problem3'=> 'string|nullable|max:255',
           'problem4'=> 'string|nullable|max:255',
           'problem5'=> 'string|nullable|max:255',
           'problem6'=> 'string|nullable|max:255',
           'problem7'=> 'string|nullable|max:255',
           'problem8'=> 'string|nullable|max:255',
           'problem9'=> 'string|nullable|max:255',
        ]);
        //モデルを使って、DBに登録する値をセット
        $drill = new Drill;  //インスタンスの生成

        //一つ一つ入れるか
//        $drill->title = $request->title;
//        $drill->save();

        $drill->fill($request->all())->save();
//        リダイレクトする
//        その時にsessionフラッシュにメッセージを入れる
        return redirect('/drills/new')->with('flash_message', __('Resistered'));
    }
    public function show($id) {
        //GETパラメータが数字かどうかチェックをする
        //事前にチェックしておくことで、DBへの無駄なアクセスが減らせる（webサーバーへのアクセスのみで済む）
        if (!ctype_digit($id)) {
            return redirect('/drills/new')->with('flash_message', __('Invalid
    operation was performed'));
        }
//        本当は空かどうかも見ないといけない
        $drill = Drill::find($id);
        return view('drills.show', ['drill' => $drill]);
    }
    public function edit($id) {
        //GETパラメータが数字かどうかチェックをする
        //事前にチェックしておくことで、DBへの無駄なアクセスが減らせる（webサーバーへのアクセスのみで済む）
        if (!ctype_digit($id)) {
            return redirect('/drills/new')->with('flash_message', __('Invalid
    operation was performed'));
        }
//        本当は空かどうかも見ないといけない
        $drill = Drill::find($id);
        return view('drills.edit', ['drill' => $drill]);
    }
    public function update(Request $request, $id) {
        //GETパラメータが数字かどうかチェックをする
        //事前にチェックしておくことで、DBへの無駄なアクセスが減らせる（webサーバーへのアクセスのみで済む）
        if (!ctype_digit($id)) {
            return redirect('/drills/new')->with('flash_message', __('Invalid
    operation was performed'));
        }
//        本当は空かどうかも見ないといけない
        $drill = Drill::find($id);
        $drill->fill($request->all())->save();
        return redirect('/drills')->with('flash_message',__('Resistered'));
    }
    public function destroy($id) {
        //GETパラメータが数字かどうかチェックをする
        //事前にチェックしておくことで、DBへの無駄なアクセスが減らせる（webサーバーへのアクセスのみで済む）
        if (!ctype_digit($id)) {
            return redirect('/drills/new')->with('flash_message', __('Invalid
    operation was performed'));
        }
//        本当は空かどうかも見ないといけない
//        $drill = Drill::find($id);
//        $drill->delete();

        Drill::find($id)->delete();
        return redirect('/drills')->with('flash_message',__('Deleted'));
    }
}
