<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Works;

class WorkController extends Controller
{
    public function add()
    {
        return view('admin.work.create');
    }

    public function create(Request $request)
    {
        // Varidationを行う
        $this->validate($request, Works::$rules);

        $works = new Works;
        $form = $request->all();

        // データベースに保存する
        $works->fill($form);
        $works->save();

        return redirect('admin/work/create');
    }

    public function edit(Request $request)
    {
        // Works Modelからデータを取得する
        $works = Works::find($request->id);
        if (empty($works)) {
            abort(404);    
        }
        return view('admin.work.edit', ['works_form' => $works]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Works::$rules);
        // Work Modelからデータを取得する
        $works = Works::find($request->id);
        // 送信されてきたフォームデータを格納する
        $works_form = $request->all();
        unset($works_form['_token']);

        // 該当するデータを上書きして保存する
        $works->fill($works_form)->save();

        return redirect('admin/work');
    }

    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        if ($cond_name != '') {
            // 検索されたら検索結果を取得する
            $posts = Works::where('name', $cond_name)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Works::all();
        }
        return view('admin.work.index', ['posts' => $posts, 'cond_name' => $cond_name]);
  }

}
