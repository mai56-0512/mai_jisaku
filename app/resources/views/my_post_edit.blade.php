投稿編集画面

@extends('layouts.app')

@section('content')

<form action="{{ route('posts.update',$post->id) }}" enctype="multipart/form-data" method="POST" id="new">
      @csrf
      @method('patch')
      <fieldset class="mb-4">

      <div class="form-group">
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


        <div class="form-group">
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

        <div class="form-group">
          <label for="subject">
            本文
          </label>
          <textarea
            id="new"
            name="episode"
            value="{{ $post->episode }}"
            class="form-control"
            rows="8"
          >
          </textarea>
        </div>

        <div class="form-group">
          <label for="subject">
            都道府県、市町村
          </label>
          <!-- <input
            type="number"
            name=""
            value=""
            class="form-control"
            > -->

          <select name="spot_id">
            @foreach ($prefs as $pref)
            <option value="{{ $pref['id'] }}">{{ $pref['prefectures'] }} {{ $pref['city'] }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="subject">
            スポット
          </label>
          <input
            type="text"
            name="spot_id"
            value="{{ $post->spot_id }}"
            class="form-control"
          >
        
        </div>

        <div class="form-group">
          <label for="exampleInputFile">
            画像
          </label>
          <input
            id="image"
            type='file'
            name="image_path"
          >
          <!-- 画像は表示されなくてOK -->
        </div>

            <input type="submit" value="更新" class="btn btn-primary">
            <input type="reset" value="キャンセル" class="btn btn-secondary" on click='window.history.back(-1);'>

      </fieldset>
  </form>

@endsection