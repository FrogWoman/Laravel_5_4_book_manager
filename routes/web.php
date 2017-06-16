<?php
use App\Book;
use Illuminate\Http\Request;

/**
* 本のダッシュボード表示
*/
Route::get('/',function(){
    $books =Book::orderBy('created_at','asc')->get();

    return view('books',[
        'books'=>$books
    ]);
});

/**
* 新「本」を追加
*/
Route::post('/books',function(Request $req){
    //バリデーション
    $validator = Validator::make($req->all(),[
        'item_name'       => 'required|min:3|max:255',
        'item_number'     => 'required|min:1|max:255',
        'item_amount'     => 'required|max:6',
        'published_month' => 'required|size:2',
        'published_day'   => 'required|size:2',
        'published_year'  => 'required|size:4',
        'published_h'     => 'required|size:2',
        'published_m'     => 'required|size:2',
    ]);

    //バリデーション:エラー
    if($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    //Eloquentモデル
    $books = new Book;
    $books->item_name   =$req->item_name;
    $books->item_number =$req->item_number;
    $books->item_amount =$req->item_amount;

    $year  = $req->published_year;
    $month = $req->published_month;
    $day   = $req->published_day;
    $h     = $req->published_h;
    $m     = $req->published_m;
    $date  = $year.'-'.$month.'-'.$day.' '.$h.':'.$m.':00';

    $books->published   =$date;        
    $books->save();

    return redirect('/');
});

/**
* 本を削除
*/
Route::delete('/book/{book}',function(Book $book){
    $book -> delete();
    return redirect('/');
});









