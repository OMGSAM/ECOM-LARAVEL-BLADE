<ul>
    @foreach ($items as $item)
        <li>
            {{ $item->name }} (x{{ $item->quantity }}) - {{ $item->price }} Dh
        </li>
    @endforeach
</ul>
