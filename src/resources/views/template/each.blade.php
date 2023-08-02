@extends ('layouts.hello-app')

@section ('title', 'Index')

@section ('menubar')
    @parent
    インデックスのページ
@endsection

@section ('content')
    <p>ここが本文のコンテンツです。</p>
    <p>必要なだけ記述できます。</p>

    <ul>
        @each ('components.item', $data, 'item')
    </ul>
@endsection

@section ('footer')
    copyright 2023 hotari.
@endsection
