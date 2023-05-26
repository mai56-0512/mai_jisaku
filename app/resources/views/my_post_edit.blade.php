<!-- 投稿編集画面 -->

@extends('layouts.app')

@section('content')

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

<form action="{{ route('posts.update',$post->id) }}" enctype="multipart/form-data" method="POST" id="new">
      @csrf
      @method('patch')
  <div class="row justify-content-center">
    <div class="w-50 border p-4 bg-light">
      <fieldset class="mb-4">
      <h1 class="text-center h4 mb-1 fw-normal">投稿編集</h1>

      <div class="w-50 p-3 form-group">
          <label for="subject">
            日付
          </label>
          <input
            id="name"
            type="date"
            name="date"
            value="{{ $post->date }}"
            class="form-control"
          >
        </div>

        <div class="w-50 p-3 form-group">
          <label for="subject">
            タイトル
          </label>
          <input
            id="name"
            type="text"
            name="title"
            value="{{ $post->title }}"
            class="form-control"
          >
        </div>

        <div class="w-auto p-3 form-group">
          <label for="subject">
            本文
          </label>
          <textarea
            id="name"
            name="episode"
            class="form-control"
            rows="8"
          >{{ $post->episode }}</textarea>
        </div>

        <div class="p-3 form-group">
          <label for="subject">
            都道府県
          </label>
          <br></br>
          <select name="spot_id" class="pull">
            @foreach ($prefs as $pref)
            <option value="{{ $pref['id'] }}">{{ $pref['prefectures'] }} {{ $pref['city'] }}</option>
            @endforeach
          </select>
        </div>

        <div class="w-50 p-3 form-group">
          <label for="subject">
            市区町村
          </label>
          <input
            id="name"
            type="text"
            name="city"
            value="{{ $post->city }}"
            class="form-control"
          >
      </div>

        <div class="p-3 form-group">
          <label for="exampleInputFile">
            画像
          </label><br></br>
          <input
            id="image"
            type='file'
            name="image_path"
          >
          <!-- 画像は表示されなくてOK -->
        </div>
        <div class="text-center">
          <input type="submit" value="更新" class="btn btn-outline-primary">
          <button type="button" class="btn btn-outline-secondary" onClick="history.back()">キャンセル</button>
        </div>

      </fieldset>
    </div>
  </div>
</form>

@endsection