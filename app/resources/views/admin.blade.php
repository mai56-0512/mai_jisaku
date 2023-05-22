@extends('layouts.app')

@section('content')

<div class="text-center mb-4">
  <h5>ユーザー管理</h5>
</div>

<table class="table">
  <thead class="text-center">
    <tr class="row mx-0 d-flex d-sm-table-row  align-items-center">
      <th class="col-1 d-block d-sm-table-cell align-middle">ユーザーID</th>
      <th class="col-2 d-block d-sm-table-cell align-middle">ユーザー名</th>
      <th class="col-2 d-block d-sm-table-cell align-middle">メールアドレス</th>
      <th class="col-2 d-block d-sm-table-cell align-middle">違反報告</th>
      <th class="col-2 d-block d-sm-table-cell align-middle">操作</th>
    </tr>
  </thead>
  @foreach($user_list as $user_all)
  <tbody>
    <tr class="row  mx-0 d-flex d-sm-table-row align-items-center">
      <td class="col-1 d-block d-sm-table-cell text-center align-middle">{{ $user_all->id }}</td>
      <td class="col-2 d-block d-sm-table-cell text-center align-middle">{{ $user_all->name }}</td>
      <td class="col-2 d-block d-sm-table-cell text-center align-middle">{{ $user_all->email }}</td>
      <td class="col-2 d-block d-sm-table-cell text-center align-middle">{{ $user_all->count }}</td>
      <td class="col-2 d-block d-sm-table-cell text-center align-middle">
      <form action="{{ route('users.stop') }}" method="POST">
          @csrf

          <div>
            <input name="user_id" type="hidden" value="{{ $user_all->id }}">
            @if($user_all->del_flg === 0)
            <button type="submit" class="btn btn-outline-danger btn-sm">停止</button>
            @else
            <button type="submit" class="btn btn-danger btn-sm">停止中</button>
            @endif
          </div>
        </form></td>
    </tr>
  </tbody>
  @endforeach
</table>


@endsection
