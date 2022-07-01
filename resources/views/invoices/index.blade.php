<x-layout>
    <h2>請求一覧</h2>
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
                <td>{{ $incoice->title }}</td>
                <td>{{ $company->manager_name }}</td>
                <td>{{ $invoice->total }}</td>
                <td>{{ $invoice->payment_deadline }}</td>
                <td>{{ $invoice->date_of_issue }}</td>
                <td>{{ $quotation->no }}</td>
                <td>{{ $invoice->status }}</td>
                <td>編集</td>
                <td>削除</td>
            </tr>
        @endforeach
    </table>
</x-layout>
