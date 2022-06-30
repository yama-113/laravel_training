<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel_training</title>
</head>
<body>
    <h2>会社一覧</h2>
    <a href="{{ route('companies.create') }}">{{__('新規作成')}}</a>
    <table border="1">
        <tr>
            <th>会社番号</th>
            <th>会社名</th>
            <th>担当者名</th>
            <th>電話番号</th>
            <th>住所</th>
            <th>メールアドレス</th>
            <th>見積一覧</th>
            <th>請求一覧</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        @foreach ($companies as $company)
            <tr>
                <td>{{$company->id}}</td>
                <td>{{$company->name}}</td>
                <td>{{$company->manager_name}}</td>
                <td>{{$company->phone_number}}</td>
                <td>
                    {{$company->postal_code}}<br>
                    {{$company->prefecture_code}}
                    {{$company->address}}
                </td>
                <td>{{$company->mail_address}}</td>
                <td><a href="">見積一覧</a></td>
                <td><a href="">請求一覧</a></td>
                <td><a href="{{ route('companies.edit',$company->id) }}">編集</a></td>
                <td><a href="{{ route('companies.destory',$company->id) }}">削除</a></td>
            </tr>
        @endforeach
    </table>
    <?php //var_dump($companies); ?>
</body>
</html>
