@extends('layouts.front')

@section('title', 'User Index')

@section('contents')
    <table id="users">
        <tr>
            <th>ユーザーID</th>
            <th>名前</th>
            <th>Eメール</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('front.user.edit', $user->id) }}" method="GET">
                        <input type="submit" value="編集">
                    </form>
                </td>
                <td>
                    <form action="{{ route('front.user.destroy', $user->id) }}" method="POST">
                        @csrf
                        <input type="submit" value="削除">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection