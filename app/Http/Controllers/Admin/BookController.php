<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
//use Illuminate\Http\Request;
use App\Http\Requests\BookPostRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookController extends Controller
{
    //

    public function index(): Response
    {   
        //書籍一覧取得
        $books = Book::with('category')
                        ->orderBy('category_id')
                        ->orderBy('title')
                        ->get();

        //書籍一覧をレスポンスとして返す
        //return view('admin/book/index', ['books' => $books]);
        return response()
                ->view('admin/book/index', ['books' => $books])
                ->header('Content-Type', 'text/html')
                ->header('Content-Encoding', 'UTF-8');
    }

    public function show(string $id): Book
    {   
        //書籍を一件取得
        $book = Book::findOrFail($id);

        //取得した書籍をレスポンスとして返す
        return $book;
    }

    public function create(): View
    {
        // ビューにカテゴリ一覧を表示するために全権取得
        $categories = Category::all();

        // ビューオブジェクトを返す
        return view('admin/book/create', [
            'categories' => $categories
        ]);
    }

    public function store(BookPostRequest $request): RedirectResponse
    {
        // 書籍データ登録用のオブジェクトを作成する
        $book = new Book();

        // リクエストオブジェクトからパラメータを取得
        $book->category_id = $request->category_id;
        $book->title = $request->title;
        $book->price = $request->price;

        // 保存
        $book->save();

        //東麓完了後book.indexにリダイレクトする
        return redirect(route('book.index'))->with('message', $book->title . 'を追加しました。');

    }

}
