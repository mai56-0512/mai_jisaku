@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('posts.index')}}">茨城県</a>
    <a href="{{ route('posts.index')}}">栃木県</a>
    <a href="{{ route('posts.index')}}">群馬県</a>
    <a href="{{ route('posts.index')}}">埼玉県</a>
    <a href="{{ route('posts.index')}}">千葉県</a>
    <a href="{{ route('posts.index')}}">東京都</a>
    <a href="{{ route('posts.index')}}">神奈川県</a>

    <div class="row justify-content-center">
    <div class="container mt-4">
  <div class="border p-4">
    <h1 class="h4 mb-4 font-weight-bold">新規作成</h1>

    <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST" id="new">
      @csrf

      <fieldset class="mb-4">

      <div class="form-group">
          <label for="subject">
            日付
          </label>
          <input
            id="name"
            type="date"
            name="date"
            value=""
            class="form-control"
          >
        </div>


        <div class="form-group">
          <label for="subject">
            タイトル
          </label>
          <input
            id="name"
            type="text"
            name="title"
            value=""
            class="form-control"
          >
        </div>

        <div class="form-group">
          <label for="subject">
            本文
          </label>
          <textarea
            id="new"
            name="episode"
            value=""
            class="form-control"
            rows="8"
          >
          </textarea>
        </div>

        <div class="form-group">
          <label for="subject">
            都道府県
          </label>
          <input
            type="number"
            name=""
            value=""
            class="form-control"
          >
        </div>

        <div class="form-group">
          <label for="subject">
            市町村
          </label>
          <input
            type="number"
            name=""
            value=""
            class="form-control"
          >
        </div>

        <div class="form-group">
          <label for="subject">
            スポット
          </label>
          <input
            type="text"
            name="spot_id"
            value=""
            class="form-control"
          >
          <!-- セレクトタグでプルダウン -->
        </div>

        <div class="form-group">
          <label for="exampleInputFile">
            画像
          </label>
          <input
            id="image"
            type='file'
            name="image"
            accept="image/png, image/jpeg"
            class="form-control-file"
          >
        </div>

            <button type="submit" class="btn btn-primary">
              投稿する
            </button>

      </fieldset>
    </form>
  </div>
</div>

    </div>
</div>
@endsection
