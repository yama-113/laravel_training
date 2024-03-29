<x-layout>
    <h2>会社登録</h2>
    <a href="{{ route('companies') }}">{{ __('戻る') }}</a>
    <form action="{{ route('companies.store') }}" method="post">
        @csrf
        <table border="1">
            <tr>
                <th>会社名</th>
                <td>
                    @error('name')
                        <div class="errors">{{ $message }}</div>
                    @enderror
                    <input type="text" name="name" value="{{ old('name') }}" maxlenght='64'>
                </td>
            </tr>
            <tr>
                <th>担当者名</th>
                <td>
                    @error('manager_name')
                        <div class="errors">{{ $message }}</div>
                    @enderror
                    <input type="text" name="manager_name" value="{{ old('manager_name') }}" maxlength="32">
                </td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>
                    @error('phone_number')
                        <div class="errors">{{ $message }}</div>
                    @enderror
                    <input type="text" name="phone_number" value="{{ old('phone_number') }}" maxlength="11">
                </td>
            </tr>
            <tr>
                <th>住所</th>
                <td>
                    郵便番号<br>
                    @error('postal_code')
                        <div class="errors">{{ $message }}</div>
                    @enderror
                    <input type="text" name="postal_code" value="{{ old('postal_code') }}" maxlength="7"><br>
                    都道府県<br>
                    @error('prefecture_code')
                        <div class="errors">{{ $message }}</div>
                    @enderror
                    @error('prefecture_code_check')
                        <div class="errors">{{ $message }}</div>
                    @enderror
                    <select name="prefecture_code">
                        <option value="">選択</option>
                        @foreach(config('prefectures') as $key => $value)
                            {{-- 三項演算子 --}}
                            {{ $selected = ($key === (int)old('prefecture_code')) ? 'selected' : '' }}
                            <option value="{{ $key }}" {{ $selected }}>{{ $value }}</option>
                        @endforeach
                    </select><br>
                    市区町村<br>
                    @error('address')
                        <div class="errors">{{ $message }}</div>
                    @enderror
                    <input type="text" name="address" value="{{ old('address') }}" maxlength="100"><br>
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>
                    @error('mail_address')
                        <div class="errors">{{ $message }}</div>
                    @enderror
                    <input type="text" name="mail_address" value="{{ old('mail_address') }}" maxlength="100">
                </td>
            </tr>
            <tr>
                <th>プレフィックス</th>
                <td>
                    @error('prefix')
                        <div class="errors">{{ $message }}</div>
                    @enderror
                    <input type="text" name="prefix" value="{{ old('prefix') }}" maxlength="8">
                </td>
            </tr>
        </table>
        <input type="submit" value="新規登録">
    </form>
</x-layout>
