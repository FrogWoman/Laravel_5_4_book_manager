<!-- resources/views/booksedit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    @include('common.errors')
    <form action="{{ url('books/update') }}" method="POST">

        <!-- item_name -->
        <div class="form-group">
           <label for="item_name">Title</label>
           {{$book->item_name}}
        </div>
        <!--/ item_name -->

        <!-- demo.blade.phpから抜粋 -->
        <div class="form-group">
            <label for="item_name">Description</label>
            {!!$book->item_description!!}
         </div>
        <!-- demo.blade.phpから抜粋 -->

        <!-- item_number -->
        <div class="form-group">
           <label for="item_number">Number</label>
           {{$book->item_number}}
        </div>
        <!--/ item_number -->

        <!-- item_amount -->
        <div class="form-group">
           <label for="item_amount">Amount</label>
           {{$book->item_amount}}
        </div>
        <!--/ item_amount -->

        <!-- published -->
        <div class="form-group">
           <label for="published">published</label>
           {{$book->published}}
        </div>
        <!--/ published -->

        <!-- Saveボタン/Backボタン -->
        <div class="well well-sm">
            <a class="btn btn-link pull-right" href="{{ url('/') }}">
                <i class="glyphicon glyphicon-backward"></i>  Back
            </a>
        </div>
        <!--/ Saveボタン/Backボタン -->

         <!-- id値を送信 -->
         <input type="hidden" name="id" value="{{$book->id}}" />
         <!--/ id値を送信 -->

         <!-- CSRF -->
         {{ csrf_field() }}
         <!--/ CSRF -->

    </form>
    </div>
    <div class="col-md-2"></div>
</div>
@endsection
