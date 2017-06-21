<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrapの定形コード… -->
    <div class="panel-body">
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->


        <!-- 現在の本 -->
        @if (count($books) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    現在の本
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <!-- テーブルヘッダ -->
                        <thead>
                            <th>公開日</th>
                            <th>タイトル</th>
                            <th>金額</th>
                            <th>数</th>
                            <th>詳細ページ</th>
                        </thead>

                        <!-- テーブル本体 -->
                        <tbody>
                            @foreach ($books as $book)
                                <tr>

                                    <!-- 公開日 -->
                                    <td class="table-text">
                                        <div>{{ $book->published }}</div>
                                    </td>

                                    <!-- 本タイトル -->
                                    <td class="table-text">
                                        <div>{{ $book->item_name }}</div>
                                    </td>

                                    <!-- 本価格 -->
                                    <td class="table-text">
                                        <div>{{ $book->item_amount }}</div>
                                    </td>

                                    <!-- 本数 -->
                                    <td class="table-text">
                                        <div>{{ $book->item_number }}</div>
                                    </td>

                                    <!-- 本詳細リンク -->
                                    <td>
                                        <form action="{{ url('public_description/'.$book->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-default">
                                                <i class="glyphicon glyphicon-trash"></i> 詳細
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
        <!-- Book: 既に登録されてる本のリスト -->

        <!-- ページネーション -->
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            {{ $books->links()}}
            </div>
        </div>
        <!-- ページネーション -->

    </div>

    <!-- Book: 既に登録されてる本のリスト -->
@endsection