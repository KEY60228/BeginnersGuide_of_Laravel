@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文のコンテンツ</p>
  <p>This is link for <middleware>google.com</middleware></p>
  <p>This is link for <middleware>yahoo.co.jp</middleware></p>
@endsection


@section('footer')
  copyright 2020 yamaguchi.
@endsection