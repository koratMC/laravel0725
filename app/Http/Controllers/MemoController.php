<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    public function index()
    {
        $memos = Memo::latest()->get();
        return view('index', compact('memos'));
    }

    public function create()
    {
        return view('memos.create');//resources/views/create.blade.phpmemo.createではなくcreateでいいかもしれない
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Memo::create($request->all());

        return redirect()->route('memos.index')
            ->with('success', 'メモが作成されました。');
    }

    public function show(Memo $memo)
    {
        return view('memos.show', compact('memo'));
    }

    public function edit(Memo $memo)
    {
        return view('memos.edit', compact('memo'));
    }

    public function update(Request $request, Memo $memo)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $memo->update($request->all());

        return redirect()->route('memos.index')
            ->with('success', 'メモが更新されました。');
    }

    public function destroy(Memo $memo)
    {
        $memo->delete();

        return redirect()->route('memos.index')
            ->with('success', 'メモが削除されました。');
    }
}
