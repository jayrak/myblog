@extends('layouts.')
@section('title', '職務経歴編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>職務経歴編集</h2>
                <form action="{{ action('Admin\WorkController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">職歴・会社名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name' , $works_form->name) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">詳細</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="description" rows="20">{{ old('description' , $works_form->description) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">参考資料</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="file" rows="20">{{ old('file' , $works_form->file) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $works_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection