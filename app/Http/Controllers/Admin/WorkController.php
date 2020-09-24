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

        $news = new Works;
        $form = $request->all();

        // データベースに保存する
        $news->fill($form);
        $news->save();

        return redirect('admin/work/create');
    }

    public function edit()
    {
        return view('admin.work.edit');
    }

    public function update()
    {
        return redirect('admin/work/edit');
    }

}
