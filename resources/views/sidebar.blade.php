<aside class="bg-grey-lightest p-6 pr-10 border-l border-r w-64">
    @yield('sidebar-top')

    <div class="widget border-b-0">
        @if (auth()->check())
            <button class="btn bg-red-light hover:bg-red-dark" @click="$modal.show('new-thread')">Add New Thread</button>
        @else
            <button class="btn bg-red-light hover:bg-red-dark w-full tracking-wide" @click="$modal.show('login')">Log In To Post</button>
        @endif
    </div>

    <div class="widget">
        <h4 class="widget-heading">Browse</h4>

        <ul class="list-reset text-sm">
            <li class="pb-3">
                <a href="/threads" class="flex items-center text-grey-darkest hover:text-red-light hover:font-bold {{ Request::is('threads') && ! Request::query() ? 'text-red' : '' }}">
                    @include ('svgs.icons.all-threads', ['class' => 'mr-3 text-blue-darkest'])
                    All Threads
                </a>
            </li>

            @if (auth()->check())
                <li class="pb-3">
                    <a href="/threads?by={{ auth()->user()->username }}"
                       class="flex items-center text-grey-darkest hover:text-red-light hover:font-bold  {{ Request::query('by') ? 'text-red ' : '' }}"
                    >
                        <img src="{{ auth()->user()->avatar_path }}"
                             alt="{{ auth()->user()->username }}"
                             class="w-4 h-4 mr-3 bg-blue-darkest rounded-full p-1">

                        My Threads
                    </a>
                </li>
            @endif

            <li class="pb-3">
                <a href="/threads?popular=1" class="flex items-center text-grey-darkest hover:text-red-light hover:font-bold {{ Request::query('popular') ? 'text-red ' : '' }}">
                    @include ('svgs.icons.star', ['class' => 'mr-3 text-blue-darkest'])
                    Popular Threads
                </a>
            </li>

            <li>
                <a href="/threads?unanswered=1" class="flex items-center text-grey-darkest hover:text-red-light hover:font-bold {{ Request::query('unanswered') ? 'text-red ' : '' }}">
                    @include ('svgs.icons.question', ['class' => 'mr-3 text-blue-darkest'])
                    Unanswered Threads
                </a>
            </li>
        </ul>
    </div>

    @if (count($trending))
        <div class="widget">
            <h4 class="widget-heading">Trending</h4>

            <ul class="list-reset">
                @foreach ($trending as $thread)
                    <li class="pb-3 text-sm">
                        <a href="{{ url($thread->path) }}" class="hover:text-red-light no-underline text-grey-darkest">
                            {{ $thread->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</aside>
