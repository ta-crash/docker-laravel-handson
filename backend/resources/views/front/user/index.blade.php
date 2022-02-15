@extends('layouts.front')

@section('title', 'User Index')

@section('contents')
    <div id="search" style="background: #0F0;">
        <h4>検索条件</h4>
        <form action="{{ route('front.user.index') }}" method="GET">
            <table id="conditions">
                <tr>
                    <th>内容</th>
                    <th>条件</th>
                </tr>
                <tr>
                    <td>年齢</td>
                    <td>
                        <span id="age">
                            <input type="text" name="age_from" value="{{ old('age_from', $conditions['age_from'] ?? '') }}">歳
                            ～
                            <input type="text" name="age_to" value="{{ old('age_to', $conditions['age_to'] ?? '') }}">歳
                        </span>
                        @error('age_from')
                            <span>{{ $message }}</span>
                        @enderror
                        @error('age_to')
                            <span>{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>都道府県</td>
                    <td>
                        <span id="prefectures">
                            @foreach ($configs['prefectures'] as $prefecture => $description)
                                <input type="checkbox" name="prefectures[]" value="{{ $prefecture }}" id="{{ 'prefecture' . $prefecture }}" {{ in_array($prefecture, old('prefectures', $conditions['prefectures'] ?? [])) ? 'checked' : '' }}>
                                <label for="{{ 'prefecture' . $prefecture }}">{{ $description }}</label>
                            @endforeach
                        </span>
                        @error('prefectures')
                            <span>{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
            </table>
            <div>
                <input type="submit" value="検索する">
            </div>
        </form>
    </div>

    <div id="result" style="background: #00F;">
        <h4>検索結果</h4>
        @if ($usersCount > 0)
            {{ $usersCount }}人ヒットしました！
            <table id="users">
                <tr>
                    <th>名前</th>
                    <th>都道府県</th>
                    <th>年齢</th>
                    <th>血液型</th>
                    <th></th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->display_name }}</td>
                        <td>{{ $user->prefecture }}</td>
                        <td>{{ $user->age }}歳</td>
                        <td>{{ $user->blood_type }}型</td>
                        <td>プロフィール</td>
                    </tr>
                @endforeach
            </table>
        @else
            該当者がいません。条件を見直してみましょう！
        @endif
    </div>
@endsection