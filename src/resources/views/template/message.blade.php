@extends ('layouts.hello-app')

@section ('title', 'Index')

@section ('menubar')
    @parent
    インデックスのページ
@endsection

@section ('content')
    <p>ここが本文のコンテンツです。</p>
    <p>必要なだけ記述できます。</p>

    @component ('components.message')
        @slot ('msgTitle')
            CAUTION!
        @endslot

        @slot ('msgContent')
            これはメッセージの表示です。
        @endslot
    @endcomponent
@endsection

@section ('footer')
    copyright 2023 hotari.
@endsection
