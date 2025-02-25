<div id="root" class="container">
    <nav>
        <ul>
            <li>
                <hgroup>
                    <h1 class="title">Elliot Dickerson</h1>
                    <h2 class="title">A site to test things</h2>
                </hgroup>
            </li>
        </ul>
        <ul>
            @foreach($links as $link => $name)
                <li>
                    <a
                        href="/{{ $link }}"
                        wire:navigate
                        style="{{ $currentName === $link ? '--pico-color: var(--pico-primary-hover);' : ''  }}"
                    >
                        {{ $name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
    <main>
        <header>
            <h2 class="title">{{ $title }}</h2>
        </header>
        @foreach($body as $paragraph)
            <p>{!! $paragraph !!}</p>
        @endforeach
    </main>
</div>
