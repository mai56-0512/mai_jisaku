<!-- 自分の投稿一覧 -->
@extends('layouts.app')

@section('content')

<div class="text-center mb-5">
  <h5>マイページ</h5>
</div>

<div class='panel-body'>
	@if($errors->any())
	<div class='alert alert-danger'>
		<ul>
			@foreach($errors->all() as $message)
			<li>{{ $message }}</li>
			@endforeach
		</ul>
	</div>
	@endif
</div>

<div class="d-flex justify-content-center">

  <!-- ユーザーアイコン表示 -->
  <div class=text-left>
    @if(Auth::user()->image_path == null)
    <img src="{{ asset('/storage/icons/noimage.png') }}" width="75%">
    @else
    <img src="{{ asset('/storage/icons/'.Auth::user()->image_path) }}" width="75%">
    @endif
  </div>
  
<div class="w-25">

  <form action="{{ route('users.update',$account->id) }}" enctype="multipart/form-data" method="POST" id="new">
    @csrf
    @method('patch')
          <div class="form-group">
            <label for="subject">
            ユーザー名
            </label>
            <input
              id="name"
              type="text"
              name="name"
              value="{{ $account->name }}"
              class="form-control"
            >
          </div>
          <div class="text-center mb-5">
            <input type="submit" value="変更" class="btn btn-outline-primary">
          </div>
  </form>
</div>
</div>

<div class="text-center mb-4">
  <h5>過去の投稿</h5>
</div>

<div class="text-center">
  <div class="row row-cols-4 w-75 mx-auto">
  @foreach($my_user as $myposts)
    <div class="col mb-5">
      <div class="card h-100">
        <img src="{{ asset('storage/images/'.$myposts->image_path) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">{{ $myposts->date }}</p>
          <h5 class="card-title">{{ $myposts->title }}</h5>
          <p class="card-text">{{ $myposts->episode }}</p>
          <p class="card-text">{{ $myposts->city }}</p>
        </div>
  
          <div class="form-inline form-group row justify-content-center">
              <a href="{{ route('posts.edit',$myposts->id) }}" class="btn btn-outline-primary mr-3">編集</a>
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
</div>

@endsection