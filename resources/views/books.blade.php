<!--resource/views/books.blade.php -->

@extends('layouts.app')

@section('content')

<div class='panel-body'>
    <!--バリデーションエラーの表示-->
    @include('common.errors')
    <!--バリデーションエラーの表示に使用-->

    <!--本 登録フォーム-->
    <form action="{{url('books')}}" method="POST" class='form-horizontal'>
        {{csrf_field()}}

        <div class="form-group">
            <!-- 本のタイトル -->
            <div class="col-sm-6">
                <label for="book" class="col-sm-3 control-label">Book</label>
                <input type="text" name="item_name" id="book-name" class="form-control" value="{{old('item_name')}}">
            </div>

            <!--本の数-->
            <div class="col-sm-6">
                <label for="amount" class="col-sm-3 control-label">Amount</label>
                <input type="text" name="item_amount" id="book-amount" class="form-control" value="{{old('item_amount')}}">
            </div>

             <!--本の金額-->
            <div class="col-sm-6">
                <label for="number" class="col-sm-3 control-label">Number</label>
                <input type="text" name="item_number" id="book-number" class="form-control" value="{{old('item_number')}}">
            </div>

            <!--本公開日-->
            <div class="col-sm-6">
                <label for="published" class="col-sm-3 control-label">Published</label>
                <input type="date" name="published" id="book-published" class="form-control" value="{{old('published')}}">
            </div>
        </div>

        <!-- 本 登録ボタン -->
        <div class='form-group'>
            <div class='col-sm-offset-3 col-sm-6'>
                <button type='submit' class='btn btn-default'>
                    <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Save
                </button>
            </div>
        </div>
    </form>

    <!--現在の本-->
    @if(count($books)>0)
        <div class="panel panel-default">
            <div class='panel-heading'>
                現在の本
            </div>

                <div class='panel-body'>
                    <table class='table table-striped task-table'>
                    <thead>
                        <th>本一覧</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!--tableの本体-->
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <!--本のタイトル-->
                            <td class='table-text'>
                                <div>{{$book->item_name}}</div>
                            </td>

                            <!--本 更新ボタン -->
                            <td>
                                <form action="{{url('booksedit/'.$book->id)}}" method='POST'>
                                    {{ csrf_field() }}

                                    <button type='submit' class='btn btn-primary'>
                                        <i class='glyphicon glyphicon-refresh'></i> UPDATE
                                    </button>
                                </form>
                            </td>

                            <!--本 削除ボタン -->
                            <td>
                                <form action="{{url('book/'.$book->id)}}" method='POST'>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type='submit' class='btn btn-danger'>
                                        <i class="glyphicon glyphicon-trash"></i> DELETE
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        {{ $books->links()}}
        </div>
    </div>
@endsection