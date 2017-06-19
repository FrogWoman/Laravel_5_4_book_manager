<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Book;
use Validator;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         $books = Book::orderBy('created_at', 'asc')->paginate(3);
         return view('books', [
            'books' => $books
         ]);
    }

    //登録
    public function store(Request $req)
    {
        //バリデーション
        $validator = Validator::make($req->all(),[
                'item_name' => 'required|min:3|max:255',
                'item_number' => 'required | min:1 | max:3',
                'item_amount' => 'required | max:6',
                'published'   => 'required',
        ]);

        //バリデーション:エラー
        if($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        //Eloquentモデル
        $books = new Book;
        $books->item_name   = $req->item_name;
        $books->item_number = $req->item_number;
        $books->item_amount = $req->item_amount;
        $books->published   = $req->published;
        $books->save();

        return redirect('/');
    }

    //更新確認画面
    public function edit(Book $books)
    {
        //{books}id 値を取得 => Book $books id 値の1レコード取得
        return view('booksedit', ['book' => $books]);
    }

    //更新
    public function update(Request $req)
    {
        //バリデーション
        $validator = Validator::make($req->all(), [
                'id'           => 'required',
                'item_name'   => 'required|min:3|max:255',
                'item_number' => 'required | min:1 | max:3',
                'item_amount' => 'required | max:6',
                'published'   => 'required',
        ]);
        //バリデーション:エラー
        if ($validator->fails()) {
                return redirect('/')
                    ->withInput()
                    ->withErrors($validator);
        }
        // Eloquentモデル
        $books = Book::find($req->id);
        $books->item_name   = $req->item_name;
        $books->item_number = $req->item_number;
        $books->item_amount = $req->item_amount;
        $books->published   = $req->published;
        $books->save();
        return redirect('/');
    }

    //削除
    public function destroy(Book $book){
        $book -> delete();
        return redirect('/');
    }
}
