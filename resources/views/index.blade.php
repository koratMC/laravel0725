@section('content')
<div class="container">
    <h1>メモ一覧</h1>
    <a href="{{ route('memos.create') }}" class="btn btn-primary mb-3">新規メモ作成</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($memos as $memo)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $memo->title }}</h5>
                        <p class="card-text">{{ Str::limit($memo->content, 100) }}</p>
                        <a href="{{ route('memos.show', $memo->id) }}" class="btn btn-info">詳細</a>
                        <a href="{{ route('memos.edit', $memo->id) }}" class="btn btn-warning">編集</a>
                        <form action="{{ route('memos.destroy', $memo->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
