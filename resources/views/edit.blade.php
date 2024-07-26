@extends('layouts.app')

@section('content')
<div class="container">
    <h1>メモ編集</h1>

    <form action="{{ route('memos.update', $memo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $memo->title) }}" required>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">内容</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5" required>{{ old('content', $memo->content) }}</textarea>
            @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">更新</button>
        <a href="{{ route('memos.show', $memo->id) }}" class="btn btn-secondary">戻る</a>
    </form>
</div>
@endsection
