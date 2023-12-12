<nav {{ $attributes }}>
    <ul class="flex space-x-4 text-slate-500">
        <li>
            <a href="/">
                Home
            </a>
        </li>
        @foreach ($links as $att => $val)
            <li>→</li>
            <li>
                <a href="{{ $val }}">{{ $att }}</a>
            </li>
        @endforeach
    </ul>
</nav>
