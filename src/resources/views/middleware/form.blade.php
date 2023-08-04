@extends ('layouts.hello-app')

@section ('title', 'Index')

@section ('menubar')
    @parent
    インデックスのページ
@endsection

@section ('content')
    <form>
        <input type="text">
        <input type="number">
        <input type="checkbox">

        <input type="submit">
    </form>
@endsection

@section ('footer')
    copyright 2023 hotari.
@endsection
