<?php
use Illuminate\Support\Str;
?>
@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="title p-2">
                                    <h1>{{ Str::limit($headline->name, 100) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ Str::limit($headline->description, 150) }}</p>
                            @if ($headline->file_path)
                                <a href="{{ asset('storage/file/' . $headline->file_path) }}" >参考資料ダウンロード</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ Str::limit($post->name, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ Str::limit($post->description, 1500) }}
                                </div>
                            </div class="body mt-3">
                                @if ($post->file_path)
                                <a href="{{ asset('storage/file/' . $post->file_path) }}" >参考資料ダウンロード</a>  
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection