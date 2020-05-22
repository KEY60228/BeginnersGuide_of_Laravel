@extends('layouts.helloapp')

@section('title', 'Show')

@section('menubar')
  @parent
  詳細ページ
@endsection

@section('content')
  @if ($items != null)
    @foreach ($items as $item)
      <table>
        <tr>
          <th width = "50px">id: </th>
          <td width = "150px">{{ $item->id }}</td>
          <th width = "50px">name: </th>
          <td width = "150px">{{ $item->name }}</td>
          <th width = "50px">mail: </th>
          <td width = "150px">{{ $item->mail }}</td>
          <th width = "50px">age: </th>
          <td width = "150px">{{ $item->age }}</td>
        </tr>
      </table>
    @endforeach
  @endif
@endsection

@section('footer')
  copyright 2020 yamaguchi.
@endsection