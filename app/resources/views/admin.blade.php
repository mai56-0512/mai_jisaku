@extends('layouts.app')

@section('content')

<table class="table">
  <thead class="text-center">
    <tr class="row mx-0 d-flex d-sm-table-row  align-items-center">
      <th class="col-1 d-block d-sm-table-cell align-middle">ユーザーID</th>
      <th class="col-2 d-block d-sm-table-cell align-middle">ユーザー名</th>
      <th class="col-2 d-block d-sm-table-cell align-middle">メールアドレス</th>
      <th class="col-2 d-block d-sm-table-cell align-middle">投稿数</th>
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
      <td class="col-2 d-block d-sm-table-cell text-center align-middle"></td>
      <td class="col-2 d-block d-sm-table-cell text-center align-middle"></td>
      <td class="col-2 d-block d-sm-table-cell text-center align-middle">
        <button class="btn btn-outline-danger">停止</button></td>
    </tr>
  </tbody>
  @endforeach
</table>


@endsection
