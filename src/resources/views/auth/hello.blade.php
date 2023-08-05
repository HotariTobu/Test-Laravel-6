@if (Auth::check())
    @php
        $user = Auth::user();
    @endphp
    <p>User: {{ $user->name }} ({{ $user->email }})</p>
@else
    <p>ログインしていません</p>
@endif
