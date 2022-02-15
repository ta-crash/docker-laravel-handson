@extends('layouts.front')

@section('title', 'User Create')

@section('contents')
    <form action="{{ route('front.user.store') }}" method="POST">
        @csrf

        <div id="basic_information">
            <h4>基本情報</h4>
            <div>
                <label for="display_name">表示名</label>
                <input type="text" name="display_name" value="{{ old('display_name') }}">
                @error('display_name')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="email">メールアドレス</label>
                <input type="text" name="email" value="{{ old('email') }}">
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password">パスワード</label>
                <input type="password" name="password">
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password_confirmation">パスワード(確認)</label>
                <input type="password" name="password_confirmation">
            </div>
        </div>

        <div id="personal_information">
            <h4>個人情報</h4>
            <div>
                <label for="name">氏名</label>
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="name_kana">氏名(カナ)</label>
                <input type="text" name="name_kana" value="{{ old('name_kana') }}">
                @error('name_kana')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="gender">性別(※登録後は変更できません)</label>
                @foreach ($configs['genders'] as $gender => $description)
                    <input type="radio" name="gender" id="{{ $gender }}" value="{{ $gender }}" {{ old('gender') === $gender ? 'checked' : '' }}>
                    <label for="{{ $gender }}">{{ $description }}</label>
                @endforeach
                @error('gender')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="birthday">生年月日</label>
                <span id="birthday">
                    <input type="text" name="birth_year" value="{{ old('birth_year') }}">年
                    <input type="text" name="birth_month" value="{{ old('birth_month') }}">月
                    <input type="text" name="birth_date" value="{{ old('birth_date') }}">日
                </span>
                @error('birth_year')
                    <span>{{ $message }}</span>
                @enderror
                @error('birth_month')
                    <span>{{ $message }}</span>
                @enderror
                @error('birth_date')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="height">身長</label>
                <input type="text" name="height" value="{{ old('height') }}">cm
                @error('height')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="weight">体重</label>
                <input type="text" name="weight" value="{{ old('weight') }}">kg
                @error('weight')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="blood_type">血液型</label>
                @foreach ($configs['bloodTypes'] as $bloodType => $description)
                    <input type="radio" name="blood_type" value="{{ $bloodType }}" {{ old('blood_type') === $bloodType ? 'checked' : '' }}>
                    <label for="{{ $bloodType }}">{{ $description }}</label>
                @endforeach
                @error('blood_type')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="tel">電話番号(ハイフンなし)</label>
                <input type="text" name="tel" value="{{ old('tel') }}">
                @error('tel')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="zip_code">郵便番号(ハイフンなし)</label>
                <input type="text" name="zip_code" value="{{ old('zip_code') }}">
                @error('zip_code')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="prefecture">都道府県</label>
                <select name="prefecture">
                    @foreach ($configs['prefectures'] as $prefecture => $description)
                        <option value="{{ $prefecture }}" {{ old('prefecture') === $prefecture ? 'selected' : '' }}>{{ $description }}</option>
                    @endforeach
                </select>
                @error('prefecture')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="address">住所</label>
                <input type="text" name="address" value="{{ old('address') }}">
                @error('address')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="address_building">住所(建物名など)</label>
                <input type="text" name="address_building" value="{{ old('address_building') }}">
                @error('address_building')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div id="plan">
            <h4>プラン</h4>
            <div>
                <label for="plan_id">プラン</label>
                <select name="plan_id">
                    @foreach ($configs['plans'] as $plan)
                        <option value="{{ $plan->id }}" {{ old('plan_id') == $plan->id ? 'selected' : '' }}>{{ $plan->description }}</option>
                    @endforeach
                </select>
                @error('plan_id')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <input type="submit" value="登録する">
        </div>
        <div>
            <a href="{{ route('front.user.index') }}">
                <button type="button">戻る</button>
            </a>
        </div>
    </form>
@endsection