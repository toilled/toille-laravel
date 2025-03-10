<div id="root" class="container" x-data="{ activity: false, joke: false }">
    <nav>
        <ul>
            <li>
                <hgroup>
                    <h1 class="title" @click="activity = !activity">Elliot Dickerson</h1>
                    <h2 class="title" @click="joke = !joke">A site to test things</h2>
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
    <footer x-cloak x-transition x-show="activity" @click="$wire.newActivity()">
        <article>
            <header>Try this {{ $activity['type'] }} activity</header>
            {{ $activity['text'] }}
        </article>
    </footer>
    <footer x-cloak x-transition x-show="joke" @click="$wire.newJoke()">
        <article>
            <header>Have a laugh!</header>
            {{ $joke  }}
        </article>
    </footer>
</div>
