<div {{ $attributes->merge(['class' => 'text-xl']) }}>
    Lists
    <h2>{{ $title }}</h2>
    <ul>
        @foreach($list('another') as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>

    {{ $slot }}
</div>