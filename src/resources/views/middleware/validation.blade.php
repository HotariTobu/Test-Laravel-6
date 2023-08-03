@extends ('layouts.hello-app')

@section ('title', 'Index')

@section ('menubar')
    @parent
    インデックスのページ
@endsection

@section ('content')
    <p>{{ $msg }}</p>
    {{-- @isset ($errors)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endisset --}}

    @if (count($errors) > 0)
        <p>入力に問題があります。再入力してください。</p>
    @endif

    <form method="post">
        @csrf
        <table>
            @if ($errors->has('name'))
                <tr>
                    <th>ERROR</th>
                    <td>{{ $errors->first('name') }}</td>
                </tr>
            @endif
            <tr>
                <th>name: </th>
                <td><input type="text" name="name" value="{{ old('name') }}"></td>
            </tr>

            @error ('mail')
                <tr>
                    <th>ERROR</th>
                    <td>{{ $errors->first('mail') }}</td>
                </tr>
            @enderror
            <tr>
                <th>mail: </th>
                <td><input type="email" name="mail" value="{{ old('mail') }}"></td>
            </tr>

            @if ($errors->has('age'))
                <tr>
                    <th>ERROR</th>
                    <td>{{ $errors->first('age') }}</td>
                </tr>
            @endif
            <tr>
                <th>age: </th>
                <td><input type="number" name="age" value="{{ old('age') }}"></td>
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
