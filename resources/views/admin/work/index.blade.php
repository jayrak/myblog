<?php
use Illuminate\Support\Str;
?>
@extends('layouts.work')
@section('title', '登録済み職務経歴一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>職務経歴一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\WorkController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\WorkController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2.5">職歴・会社名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_name" value="{{ $cond_name }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="25%">職歴・会社名</th>
                                <th width="35%">詳細</th>
                                <th width="20%">参考資料</th>
                                <th width="15%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $works)
                                <tr>
                                    <th>{{ $works->id }}</th>
                                    <td>{{ Str::limit($works->name, 100) }}</td>
                                    <td>{{ Str::limit($works->description, 150) }}</td>
                                    <td>
                                        <a href="{{ asset('storage/file/' . $works->file_path) }}" download>ダウンロード</a>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\WorkController@edit', ['id' => $works->id]) }}">編集</a>
                                            <a href="{{ action('Admin\WorkController@delete', ['id' => $works->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection