@foreach ($items as $item)
    <p>
        {{ $item->describe() }}
    </p>
    @isset ($item->board)
        <p style="margin-inline-start: 10pt;">
            {{ $item->board->describe() }}
        </p>
    @endisset
@endforeach
