<!--resource/views/books.blade.php -->

@extends('layouts.app')

@section('content')

<!-- Bootstrapの提携コード...-->

<div class='panel-body'>
	<!--バリデーションエラーの表示-->
	@include('common.errors')
	<!--バリデーションエラーの表示に使用-->

	<!--本 登録フォーム-->
	<form action="{{url('books')}}" method="POST" class='form-horizontal'>
		{{csrf_field()}}

		<!--本のタイトル-->
		<div class='form-group'>
			<label for='book' class='col-sm-3 control-label'>Book</label>

			<div class='col-sm-6'>
				<input type='text' name='item_name' id='book-name' class='form-control'>
			</div>
		</div>

		<!--本の数-->
		<div class='form-group'>
			<label for='book' class='col-sm-3 control-label'>Number</label>

			<div class='col-xs-9 col-sm-9 form-inline'>
				<input type='text' name='item_number' id='book-number' class='form-control'>
			</div>
		</div>


		<!--本の金額-->
	    <div class="form-group">
		<label for='book' class='col-sm-3 control-label'>Amount</label>
	        <div class="col-xs-9 col-sm-9 form-inline">
				<input type='text' name='item_amount' id='book-number' class='form-control'><label>yen</label>
	        </div>
	    </div>


		<!--本公開日-->
	    <div class="form-group">
	        <label class="control-label col-xs-3 col-sm-3">Published date</label>
	        <div class="col-xs-9 col-sm-9 form-inline">
	            <input type="text" class="form-control" name="published_month" size="2"><label>M</label>
	            <input type="text" class="form-control" name="published_day" size="2"><label>D</label>		            
	            <input type="text" class="form-control" name="published_year" size="4"><label>Y</label>
	            <input type="text" class="form-control" name="published_h" size="2"><label>h</label>
	            <input type="text" class="form-control" name="published_m" size="2"><label>m</label>
	        </div>
	    </div>

		<!-- 本 登録ボタン -->
		<div class='form-group'>
			<div class='col-sm-offset-3 col-sm-6'>
				<button type='submit' class='btn btn-default'>
					<i class='fa fa-plus'></i>
					<span class ='glyphicon glyphicon-plus'>
						Save
					</span>
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
							<!--本 削除ボタン -->						
							<td>
								<form action="{{url('book/'.$book->id)}}" method='POST'>
									{{ csrf_field() }}
									{{ method_field('DELETE') }}

									<button type='submit' class='btn btn-danger'>
									<i class='fa fa-trash'></i>
									<span class ='glyphicon glyphicon-trash'>
										削除
									</span>
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



<!--Book:既に登録されている本のリスト-->
@endsection