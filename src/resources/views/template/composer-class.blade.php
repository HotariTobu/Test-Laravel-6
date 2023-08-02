@extends ('layouts.hello-app')

@section ('title', 'Index')

@section ('menubar')
    @parent
    インデックスのページ
@endsection

@section ('content')
    <p>ここが本文のコンテンツです。</p>
    <p>必要なだけ記述できます。</p>

    <p>ViewComposer value: {{ $composerMessage }}</p>
@endsection

@section ('footer')
    copyright 2023 hotari.
@endsection
