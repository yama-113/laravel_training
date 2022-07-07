<h2>会社情報更新</h2>
<a href="{{ route('companies') }}">{{ __('戻る') }}</a>
<form action="{{ route('companies.update',$company->id) }}" method="post">
    @csrf
    <table border="1">
        <tr>
            <th>会社名</th>
            <td>
                <input type="text" name="name" value="{{ old('name', $company->name) }}">
                @error('name')
                        <div class="errors">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>担当者名</th>
            <td>
                <input type="text" name="manager_name" value="{{ old('manager_name', $company->manager_name) }}">
                @error('manager_name')
                        <div class="errors">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>
                <input type="text" name="phone_number" value="{{ old('manager_name', $company->phone_number) }}">
                @error('phone_number')
                        <div class="errors">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>住所</th>
            <td>
                郵便番号
                <input type="text" name="postal_code" value="{{ old('postal_code', $company->postal_code) }}"><br>
                @error('postal_code')
                        <div class="errors">{{ $message }}</div>
                @enderror
                都道府県
                <select name="prefecture_code">
                    @foreach(config('prefectures') as $key => $value)
                        {{ $selected = ($key === (int)old('prefecture_code', $company->prefecture_code)) ? 'selected' : '' }}
                        <option value="{{ $key }}" {{ $selected }}>{{ $value }}</option>
                    @endforeach
                </select><br>
                @error('prefecture_code')
                        <div class="errors">{{ $message }}</div>
                @enderror
                @error('prefecture_code_check')
                        <div class="errors">{{ $message }}</div>
                @enderror
                市区町村
                <input type="text" name="address" value="{{ $company->address }}"><br>
                @error('address')
                        <div class="errors">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>
                <input type="text" name="mail_address" value="{{ $company->mail_address }}">
                @error('mail_address')
                        <div class="errors">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>プレフィックス</th>
            <td>{{ $company->prefix }}</td>
            <input type="hidden" name="prefix" value="{{ $company->prefix }}">
        </tr>
    </table>
    <input type="submit" value="更新">
</form>
