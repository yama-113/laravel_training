<x-layout>
    <h2>請求一覧</h2>
    <div>{{ $company->name }}</div>
    <a href="{{ route('companies') }}">会社一覧に戻る</a>
    <a href="{{ route('invoices.create',['id'=>$company->id]) }}">新規作成</a>
    <table border="1">
        <tr>
            <th>請求番号</th>
            <th>請求名</th>
            <th>担当者名</th>
            <th>金額</th>
            <th>支払期限</th>
            <th>請求日</th>
            <th>見積番号</th>
            <th>状態</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->no }}</td>
                <td>{{ $invoice->title }}</td>
                <td>{{ $company->manager_name }}</td>
                <td>{{ $invoice->total }}</td>
                <td>{{ $invoice->payment_deadline }}</td>
                <td>{{ $invoice->date_of_issue }}</td>
                <td>{{ $invoice->quotation_no }}</td>
                <td>{{ config('status')[$invoice->status] }}</td>
                <td><a href="{{ route('invoices.edit',['id'=>$company->id, 'iid'=>$invoice->id]) }}">編集</a></td>
                <td><a href="{{ route('invoices.destroy',['id'=>$company->id, 'iid'=>$invoice->id]) }}">削除</a></td>
            </tr>
        @endforeach
    </table>
</x-layout>
