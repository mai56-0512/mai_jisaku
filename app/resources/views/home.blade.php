@extends('layouts.app')

@section('content')

<div id="japan-map" class="clearfix">

<div id="hokkaido-touhoku" class="clearfix">
	<p class="area-title">北海道・東北</p>
	<div class="area">
		<a href="{{ route('posts.show',1) }}">
        	<div id="hokkaido">
        		<p>北海道</p>
          	</div>
		</a>
		<a href="{{ route('posts.show',2) }}">
			<div id="aomori">
				<p>青森</p>
			</div>
		</a>
		<a href="{{ route('posts.show',3) }}">
			<div id="akita">
				<p>秋田</p>
			</div>
		</a>
		<a href="{{ route('posts.show',4) }}">
			<div id="iwate">
				<p>岩手</p>
			</div>
		</a>
		<a href="{{ route('posts.show',5) }}">
			<div id="yamagata">
				<p>山形</p>
			</div>
		</a>
		<a href="{{ route('posts.show',6) }}">
			<div id="miyagi">
				<p>宮城</p>
			</div>
		</a>
		<a href="{{ route('posts.show',7) }}">
			<div id="fukushima">
				<p>福島</p>
			</div>
		</a>
	</div>
</div>

<div id="kantou">
	<p class="area-title">関東</p>
	<div class="area">
  <a href="{{ route('posts.show',8) }}">
			<div id="gunma">
				<p>群馬</p>
			</div>
		</a>
		<a href="{{ route('posts.show',9) }}">
			<div id="tochigi">
				<p>栃木</p>
			</div>
		</a>
		<a href="{{ route('posts.show',10) }}">
			<div id="ibaraki">
				<p>茨城</p>
			</div>
		</a>
		<a href="{{ route('posts.show',11) }}">
			<div id="saitama">
				<p>埼玉</p>
			</div>
		</a>
		<a href="{{ route('posts.show',12) }}">
			<div id="chiba">
				<p>千葉</p>
			</div>
		</a>
		<a href="{{ route('posts.show',13) }}">
			<div id="tokyo">
				<p>東京</p>
			</div>
		</a>
		<a href="{{ route('posts.show',14) }}">
			<div id="kanagawa">
				<p>神奈川</p>
			</div>
		</a>
	</div>
</div>

<div id="tyubu" class="clearfix">
	<p class="area-title">中部</p>
	<div class="area">
		<a href="{{ route('posts.show',15) }}">
			<div id="nigata">
				<p>新潟</p>
			</div>
		</a>
		<a href="{{ route('posts.show',16) }}">
			<div id="toyama">
				<p>富山</p>
			</div>
		</a>
		<a href="{{ route('posts.show',17) }}">
			<div id="ishikawa">
				<p>石川</p>
			</div>
		</a>
		<a href="{{ route('posts.show',18) }}">
			<div id="fukui">
				<p>福井</p>
			</div>
		</a>
		<a href="{{ route('posts.show',19) }}">
			<div id="nagano">
				<p>長野</p>
			</div>
		</a>
		<a href="{{ route('posts.show',20) }}">
			<div id="gifu">
				<p>岐阜</p>
			</div>
		</a>
		<a href="{{ route('posts.show',21) }}">
			<div id="yamanashi">
				<p>山梨</p>
			</div>
		</a>
		<a href="{{ route('posts.show',22) }}">
			<div id="aichi">
				<p>愛知</p>
			</div>
		</a>
		<a href="{{ route('posts.show',23) }}">
			<div id="shizuoka">
				<p>静岡</p>
			</div>
		</a>
	</div>
</div>

<div id="kinki" class="clearfix">
	<p class="area-title">近畿</p>
	<div class="area">
		<a href="{{ route('posts.show',24) }}">
			<div id="kyoto">
				<p>京都</p>
			</div>
		</a>
		<a href="{{ route('posts.show',25) }}">
			<div id="shiga">
				<p>滋賀</p>
			</div>
		</a>
		<a href="{{ route('posts.show',26) }}">
			<div id="osaka">
				<p>大阪</p>
			</div>
		</a>
		<a href="{{ route('posts.show',27) }}">
			<div id="nara">
				<p>奈良</p>
			</div>
		</a>
		<a href="{{ route('posts.show',28) }}">
			<div id="mie">
				<p>三重</p>
			</div>
		</a>
		<a href="{{ route('posts.show',29) }}">
			<div id="wakayama">
				<p>和歌山</p>
			</div>
		</a>
		<a href="{{ route('posts.show',30) }}">
			<div id="hyougo">
				<p>兵庫</p>
			</div>
		</a>
	</div>
</div>

<div id="tyugoku" class="clearfix">
	<p class="area-title">中国</p>
	<div class="area">
		<a href="{{ route('posts.show',31) }}">
			<div id="tottori">
				<p>鳥取</p>
			</div>
		</a>
		<a href="{{ route('posts.show',32) }}">
			<div id="okayama">
				<p>岡山</p>
			</div>
		</a>
		<a href="{{ route('posts.show',33) }}">
			<div id="shimane">
				<p>島根</p>
			</div>
		</a>
		<a href="{{ route('posts.show',34) }}">
			<div id="hiroshima">
				<p>広島</p>
			</div>
		</a>
		<a href="{{ route('posts.show',35) }}">
			<div id="yamaguchi">
				<p>山口</p>
			</div>
		</a>
	</div>
</div>

<div id="shikoku" class="clearfix">
	<p class="area-title">四国</p>
	<div class="area">
		<a href="{{ route('posts.show',36) }}">
			<div id="kagawa">
				<p>香川</p>
			</div>
		</a>
		<a href="{{ route('posts.show',37) }}">
			<div id="ehime">
				<p>愛媛</p>
			</div>
		</a>
		<a href="{{ route('posts.show',38) }}">
			<div id="tokushima">
				<p>徳島</p>
			</div>
		</a>
		<a href="{{ route('posts.show',39) }}">
			<div id="kouchi">
				<p>高知</p>
			</div>
		</a>
	</div>
</div>

<div id="kyusyu" class="clearfix">
	<p class="area-title">九州・沖縄</p>
	<div class="area">
		<a href="{{ route('posts.show',40) }}">
			<div id="fukuoka">
				<p>福岡</p>
			</div>
		</a>
		<a href="{{ route('posts.show',41) }}">
			<div id="saga">
				<p>佐賀</p>
			</div>
		</a>
		<a href="{{ route('posts.show',42) }}">
			<div id="nagasaki">
				<p>長崎</p>
			</div>
		</a>
		<a href="{{ route('posts.show',43) }}">
			<div id="oita">
				<p>大分</p>
			</div>
		</a>
		<a href="{{ route('posts.show',44) }}">
			<div id="kumamoto">
				<p>熊本</p>
			</div>
		</a>
		<a href="{{ route('posts.show',45) }}">
			<div id="miyazaki">
				<p>宮崎</p>
			</div>
		</a>
		<a href="{{ route('posts.show',46) }}">
			<div id="kagoshima">
				<p>鹿児島</p>
			</div>
		</a>
		<a href="{{ route('posts.show',47) }}">
			<div id="okinawa">
				<p>沖縄</p>
			</div>
		</a>
	</div>
</div>

</div> <!-- japan-map -->


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

<div class="row justify-content-center" >
  <div class="w-50 border p-4">
    <h1 class="text-center h4 mb-1 fw-normal">新規作成</h1>

    <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST" id="new">
      @csrf

      <fieldset class="mb-4">

      <div class="w-50 p-3 form-group">
          <label for="subject">
            日付
          </label>
          <input
            id="name"
            type="date"
            name="date"
            value="{{ old('date') }}"
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
            value="{{ old('title') }}"
            class="form-control"
          >
      </div>

      <div class="w-auto p-3 form-group">
          <label for="subject">
            本文
          </label>
          <textarea
            id="new"
            name="episode"
            value="{{ old('episode') }}"
            class="form-control"
            rows="8"
          >
          </textarea>
      </div>

      <div class="w-50 form-group">
          <label for="subject">
            都道府県
          </label>
          <br></br>
          <select name="pref_id">
            @foreach ($prefs as $pref)
            <option value="{{ $pref['id'] }}">{{ $pref['prefectures'] }}</option>
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
            value="{{ old('city') }}"
            class="form-control"
          >
      </div>

      <div class="w-50 p-3 form-group">
          <label for="subject">
            スポット
          </label>
          <input
            type="text"
            name="spot_id"
            value="{{ old('spot_id') }}"
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
      </div>
        <div class="text-center">
          <button type="submit" class="text-center btn btn-outline-primary">
            投稿する
          </button>
        </div>

      </fieldset>
    </form>
  </div>
</div>

@endsection
