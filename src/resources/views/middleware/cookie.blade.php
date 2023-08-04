@extends ('layouts.hello-app')

@section ('title', 'Index')

@section ('menubar')
    @parent
    インデックスのページ
@endsection

@section ('content')
    <p>{{ $msg }}</p>

    @if (count($errors) > 0)
        <p>入力に問題があります。再入力してください。</p>
    @endif

    <form method="post">
        @csrf
        <table>
            @if ($errors->has('msg'))
                <tr>
                    <th>ERROR</th>
                    <td>{{ $errors->first('msg') }}</td>
                </tr>
            @endif
            <tr>
                <th>msg: </th>
                <td><input type="text" name="msg" value="{{ old('msg') }}"></td>
            </tr>

            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </table>
    </form>
@endsection

@section ('footer')
    copyright 2023 hotari.
@endsection
