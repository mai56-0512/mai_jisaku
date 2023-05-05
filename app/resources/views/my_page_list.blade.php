<!-- 自分の投稿一覧 -->
@extends('layouts.app')

@section('content')

<a href="{{ route('users.edit') }}" class="btn btn-primary">マイページ編集</a>

<div class="row row-cols-1 row-cols-md-3 g-4">
@foreach($my_user as $myposts)
  <div class="col">
    <div class="card h-70">
      <img src="{{ asset('storage/images/'.$myposts->image_path) }}" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text">{{ $myposts->date }}</p>
        <h5 class="card-title">{{ $myposts->title }}</h5>
        <p class="card-text">{{ $myposts->episode }}</p>
        <p class="card-text">{{ $myposts->spot_id }}</p>
      </div>
      <div class="card w-50">
        <a href="{{ route('posts.edit',$myposts->id) }}" class="btn btn-primary">編集</a>
        
        <input type="submit" value="削除" onclick='return confirm("本当に削除しますか？")'>
        <!-- <a href="{{ route('users.destroy',$myposts->id) }}" class="btn btn-primary">削除</a> -->
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection