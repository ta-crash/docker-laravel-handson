@extends('layouts.admin')

@section('title', 'Admin Index')

@section('contents')
    <table id="admins">
        <tr>
            <th>管理者ID</th>
            <th>名前</th>
            <th>Eメール</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    <form action="{{ route('admin.admin.edit', $admin->id) }}" method="GET">
                        <input type="submit" value="編集">
                    </form>
                </td>
                <td>
                    <form action="{{ route('admin.admin.destroy', $admin->id) }}" method="POST">
                        @csrf
                        <input type="submit" value="削除">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection