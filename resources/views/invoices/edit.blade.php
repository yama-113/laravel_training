<x-layout>
    <h2>請求作成</h2>
    <a href="{{ route('invoices',['id'=>$company->id]) }}">戻る</a>
    <form action="{{route('invoices.update',['id'=>$company->id,'iid'=>$invoice->id])}}" method="post">
        @csrf
        <table border="1">
            <tr>
                <th>請求名</th>
                <td>
                    <input type="text" name="title" value="{{old('title',$invoice->title)}}">
                    @error('title')
                        {{$message}}
                    @enderror
                </td>
            </tr>
            <tr>
                <th>会社名</th>
                <td>
                    {{$company->name}}
                </td>
            </tr>
            <tr>
                <th>金額</th>
                <td>
                    <input type="text" name="total" value="{{old('total',$invoice->total)}}">
                    @error('total')
                        {{$message}}
                    @enderror
                </td>
            </tr>
            <tr>
                <th>支払期限</th>
                <td>
                    <input type="date" name="payment_deadline" value="{{old('date',$invoice->payment_deadline)}}">
                    @error('payment_deadline')
                        {{$message}}
                    @enderror
                </td>
            </tr>
            <tr>
                <th>請求日</th>
                <td>
                    <input type="date" name="date_of_issue" value="{{old('date_of_issue',$invoice->date_of_issue)}}">
                    @error('date_of_issue')
                        {{$message}}
                    @enderror
                </td>
            </tr>
            <tr>
                <th>見積番号</th>
                <td>
                    {{$invoice->quotation_no}}
                </td>
            </tr>
            <tr>
                <th>状態</th>
                <td>
                    <select name="status">
                        <option value="">選択</option>
                        @foreach(config('status') as $key => $value)
                            {{$selected = ($key === (int)old('status',$invoice->status)) ? 'selected' : ''}}
                            <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                        @endforeach
                    </select>
                    @error('status')
                        {{$message}}
                    @enderror
                    @error('status_check')
                        {{$message}}
                    @enderror
                </td>
            </tr>
        </table>
        <input type="submit">
    </form>
</x-layout>
