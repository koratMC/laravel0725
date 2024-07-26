@extends('layouts.app')

@section('content')
<div class="container">
    <h1>メモ詳細</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $memo->title }}</h5>
            <p class="card-text">{{ $memo->content }}</p>
            <p class="text-muted">作成日時: {{ $memo->created_at->format('Y-m-d H:i:s') }}</p>
            <p class="text-muted">更新日時: {{ $memo->updated_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('memos.edit', $memo->id) }}" class="btn btn-warning">編集</a>
        <form action="{{ route('memos.destroy', $memo->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
        </form>
        <a href="{{ route('memos.index') }}" class="btn btn-secondary">戻る</a>
    </div>
</div>
@endsection
