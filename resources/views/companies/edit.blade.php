<h2>会社情報更新</h2>
<a href="{{ route('companies') }}">{{ __('戻る') }}</a>
<form action="{{ route('companies.update',['id' => $company->id]) }}" method="post">
    @csrf
    <table border="1">
        <tr>
            <th>会社名</th>
            <td><input type="text" name="name" value="{{ $company->name }}"></td>
        </tr>
        <tr>
            <th>担当者名</th>
            <td><input type="text" name="manager_name" value="{{ $company->manager_name }}"></td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td><input type="text" name="phone_number" value="{{ $company->phone_number }}"></td>
        </tr>
        <tr>
            <th>住所</th>
            <td>
                郵便番号<input type="text" name="postal_code" value="{{ $company->postal_code }}"><br>
                都道府県<input type="text" name="prefecture_code" value="{{ $company->prefecture_code }}"><br>
                市区町村<input type="text" name="address" value="{{ $company->address }}"><br>
            </td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td><input type="text" name="mail_address" value="{{ $company->mail_address }}"></td>
        </tr>
        <tr>
            <th>プレフィックス</th>
            <td>{{ $company->prefix }}</td>
        </tr>
    </table>
    <input type="submit" value="更新">
</form>
