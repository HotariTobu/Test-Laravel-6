@foreach ($items as $item)
    <p>
        {{ $item->describe() }}
    </p>
@endforeach
