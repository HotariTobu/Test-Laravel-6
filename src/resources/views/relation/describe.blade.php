@foreach ($items as $item)
    <p>
        {{ $item->describe() }}
        {{ $item->person?->describe() }}
    </p>
@endforeach
