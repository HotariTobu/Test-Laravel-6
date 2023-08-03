@extends ('layouts.hello-app')

@section ('title', 'Index')

@section ('menubar')
    @parent
    インデックスのページ
@endsection

@section ('content')
    <p>ここが本文のコンテンツです。</p>
    <p>必要なだけ記述できます。</p>

    <table>
        @foreach ($data as $item)
            <tr>
                <th>{{ $item['name'] }}</th>
                <td>{{ $item['mail'] }}</td>
            </tr>
        @endforeach
    </table>

    <p>これは、<middleware>google.com</middleware>へのリンクです。</p>
    <p>これは、<middleware>yahoo.co.jp</middleware>へのリンクです。</p>
@endsection

@section ('footer')
    copyright 2023 hotari.
@endsection
