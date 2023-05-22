@extends('layouts.app')

@section('content')
<!-- 都道府県の投稿一覧 -->

<div class="text-center">
  <form action="{{ route('posts.show',$pref_id) }}" method="GET">
    <input type="text" placeholder="キーワードを入力" name="keyword" value="{{ $keyword }}">
    <input type="submit" value="検索">
  </form>
</div>

<form action="{{ route('posts.show',$pref_id) }}" enctype="multipart/form-data" method="GET" id="new">
  <div class="text-center mb-2">
      <input type="date" name="from" placeholder="from_date" value="{{ $from ?? '' }}">
      <span class="mx-3">~</span>
      <input type="date" name="until" placeholder="until_date" value="{{ $until ?? '' }}">
      <button type="submit">検索</button>
  </div>
</form>


<div class="row row-cols-1 row-cols-md-4 g-4 w-75">
@foreach($all_post as $userposts)
  <div class="col">
    <div class="card h-60 w-60">
      <img src="{{ asset('storage/images/'.$userposts->image_path) }}" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text">{{ $userposts->name }}</p>
        <p class="card-text">{{ $userposts->date }}</p>
        <h5 class="card-title">{{ $userposts->title }}</h5>
        <p class="card-text">{{ $userposts->episode }}</p>
        <p class="card-text">{{ $userposts->city }}</p>
        <p class="card-text">{{ $userposts->spot_id }}</p>

        @if($like_model->like_exist(Auth::user()->id,$userposts->id))
        <p class="favorite-marke text-right">
          <a class="js-like-toggle loved" href="" data-postid="{{ $userposts->id }}">
          <i class="far fa-heart"></i></a>
          <span class="likesCount">{{$userposts->likes_count}}</span>
        </p>
        @else
        <p class="favorite-marke text-right">
          <a class="js-like-toggle" href="" data-postid="{{ $userposts->id }}"><i class="fas fa-heart"></i></a>
          <span class="likesCount">{{$userposts->likes_count}}</span>
        </p>
        @endif

        <form action="{{ route('users.badCount') }}" method="POST">
          @csrf
          <div class="text-right">
            <input name="spot_id" type="hidden" value="{{ $userposts->spot_id }}">
            <input name="user_id" type="hidden" value="{{ $userposts->user_id }}">
            <button type="submit" class="btn btn-outline-warning btn-sm">違反報告</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  @endforeach

  
</div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(function () {
    var like = $('.js-like-toggle');
    var likePostId;
    
    like.on('click', function () {
        var $this = $(this);
        likePostId = $this.data('postid');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ajax/like',  //routeの記述
                type: 'POST', //受け取り方法の記述（GETもある）
                data: {
                    'post_id': likePostId //コントローラーに渡すパラメーター
                },
        })
    
            // Ajaxリクエストが成功した場合
            .done(function (data) {
    //lovedクラスを追加
                $this.toggleClass('loved'); 
    
    //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
                $this.next('.likesCount').html(data.postLikesCount); 
    
            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
    //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
    //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        
        return false;
    });
    });
</script>