<!-- 自分の投稿一覧 -->
@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">

  <form action="{{ route('users.update',$account->id) }}" enctype="multipart/form-data" method="POST" id="new">
    @method('PUT')
    @csrf

  <!-- ユーザーアイコン表示 -->
  <div class=text-center>
    @if(Auth::user()->image_path == null)
      <img src="{{ asset('/storage/icons/noimage.png') }}" width="75%">
    @else
      <img src="{{ asset('/storage/icons/'.Auth::user()->image_path) }}" width="75%">
    @endif
  </div>

          <div class="form-group">
            <label for="subject">
            ユーザー名
            </label>
            <input
              id="name"
              type="text"
              name="user_name"
              value="{{ $account->name }}"
              class="form-control"
            >
          </div>
          <div class="form-group">
            <label for="subject">
            メールアドレス
            </label>
            <input
              id="name"
              type="text"
              name="user_name"
              value="{{ $account->email }}"
              class="form-control"
            >
          </div>
          <div class="text-center mb-5">
            <input type="submit" value="変更" class="btn btn-outline-primary">
          </div>
  </form>
</div>

<div class="row row-cols-1 row-cols-md-4 g-4 w-75">
@foreach($my_user as $myposts)
  <div class="col">
    <div class="card">
      <img src="{{ asset('storage/images/'.$myposts->image_path) }}" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text">{{ $myposts->date }}</p>
        <h5 class="card-title">{{ $myposts->title }}</h5>
        <p class="card-text">{{ $myposts->episode }}</p>
        <p class="card-text">{{ $myposts->city }}</p>
        <p class="card-text">{{ $myposts->spot_id }}</p>
      </div>

        <div class="form-inline">
            <a href="{{ route('posts.edit',$myposts->id) }}" class="btn btn-outline-primary">編集</a>
    
            <form action="{{ route('posts.destroy', $myposts->id) }}" method="POST">
              @csrf
              @method('delete')
              <button type="submit" onclick='return confirm("本当に削除しますか？")' class="btn btn-outline-danger">削除</button>
            </form>
        </div>
    </div>
  </div>
  @endforeach
</div>

@endsection