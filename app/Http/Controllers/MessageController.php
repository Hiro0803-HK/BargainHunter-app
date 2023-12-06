<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;

class MessageController extends Controller
{
    //
    public function index(): View
    {
        $messages = Message::all();
        return view('message/index', ['messages' => $messages]);
    }

    public function store(Request $request): RedirectResponse
    {
        //リクエストからbodyを取得し、保存
        $message = new Message();
        $message->body = $request->body;
        $message->save();

        // 処理後リダイレクト
        return redirect('/messages');
    }

}
