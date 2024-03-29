<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel_training</title>
</head>
<body>
    <h2>見積一覧</h2>
    <div>{{ $company->name }}</div>
    <a href="{{ route('companies') }}">会社一覧に戻る</a>
    <a href="{{ route('quotations.create',$company->id) }}">{{__('新規作成')}}</a>
    <table border="1">
        <tr>
            <th>見積番号</th>
            <th>見積名</th>
            <th>担当者名</th>
            <th>金額</th>
            <th>見積書有効期限</th>
            <th>納期</th>
            <th>状態</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        @foreach ($quotations as $quotation)
            <tr>
                <td>{{$quotation->no}}</td>
                <td>{{$quotation->title}}</td>
                <td>{{$company->manager_name}}</td>
                <td>{{$quotation->total}}</td>
                <td>{{$quotation->validity_period}}</td>
                <td>{{$quotation->due_date}}</td>
                <td>{{config('status')[$quotation->status]}}</td>
                <td><a href="{{ route('quotations.edit', ['id'=>$company->id, 'qid'=>$quotation->id]) }}">編集</a></td>
                <td><a href="{{ route('quotations.destroy', ['id'=>$company->id, 'qid'=>$quotation->id]) }}">削除</a></td>
            </tr>
        @endforeach
    </table>
</body>
