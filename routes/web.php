<?php
use App\Book;
use Illuminate\Http\Request;

//---------------------------
//本のダッシュボード表示
//---------------------------
Route::get('/',function(){
    $books =Book::orderBy('created_at','asc')->get();

    return view('books',[
        'books'=>$books
    ]);
});

//新「本」を追加
Route::post('/books',function(Request $req){
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
});

//更新画面
Route::post('/booksedit/{books}', function(Book $books) {
    //{books}id 値を取得 => Book $books id 値の1レコード取得
    return view('booksedit', ['book' => $books]);
});

//---------------------------
//更新処理
//---------------------------
Route::post('/books/update', function (Request $req) {
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
    $books->save();   //「/」ルートにリダイレクト
    return redirect('/');
});


//---------------------------
//本を削除
//---------------------------
Route::delete('/book/{book}',function(Book $book){
    $book -> delete();
    return redirect('/');
});









