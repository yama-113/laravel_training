<x-layout>
    <h2>見積作成</h2>
    <a href="{{ route('quotations', $company->id) }}">戻る</a>
    <form action="{{ route('quotations.store',$company->id) }}" method="post">
        @csrf
        <table border="1">
            <tr>
                <th>見積名</th>
                <td>
                    <input type="text" name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="errors">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <th>会社名</th>
                <td>{{$company->name}}</td>
            </tr>
            <tr>
                <th>金額</th>
                <td>
                    <input type="text" name="total" value="{{ old('total') }}">
                    @error('total')
                        <div class="errors">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <th>見積書有効期限</th>
                <td>
                    <input type="date" name="validity_period" value="{{ old('validity_period') }}">
                    @error('validity_period')
                        <div class="errors">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <th>納期</th>
                <td>
                    <input type="date" name="due_date" value="{{ old('due_date') }}">
                    @error('due_date')
                        <div class="errors">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <th>状態</th>
                <td>
                    <select name="status">
                        <option value="">選択</option>
                        @foreach(config('status') as $key => $value)
                            {{ $selected = ($key === (int)old('status')) ? 'selected' : '' }}
                            <option value="{{ $key }}" {{ $selected }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('status')
                        <div class="errors">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
        </table>
        <input type="hidden" name="company_id" value="{{ $company->id }}">
        <input type="submit" value="請求作成">
    </form>
</x-layout>
