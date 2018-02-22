<aside class="bg-grey-lightest p-6 pr-10 border-l border-r w-64">
    @yield('sidebar-top')

    <div class="widget  flex">
        @if (auth()->check())
        @if(auth()->user()->confirmed)
            <button class="btn content-center bg-transparent text-red-light border border-red-light hover:bg-red-light uppercase text-xs " @click="$modal.show('new-thread')" >New Thread</button>
        @else
        <button class="btn is-outlined text-blue border border-blue-light w-full">Please confirm your email address</button>
        @endif
        @else
            <button class="btn content-center bg-transparent text-red-light border border-red-light hover:bg-red-light uppercase text-xs" @click="$modal.show('login')">Log In To Post</button>
        @endif
    </div>

    <div class="widget">
        <h4 class="widget-heading">Browse</h4>

        <ul class="list-reset text-sm">
            <li class="pb-3">
                <a href="/threads" class="flex items-center text-grey-darkest hover:text-red-light {{ Request::is('threads') && ! Request::query() ? 'text-black-darkest font-bold' : '' }}">
                    @include ('svgs.icons.all-threads', ['class' => 'mr-3 text-grey-darker'])
                   
                            All Threads
              
                </a>
            </li>

            @if (auth()->check())
                <li class="pb-3">
                    <a href="/threads?by={{ auth()->user()->username }}"
                       class="flex items-center text-grey-darkest hover:text-red-light   {{ Request::query('by') ? 'text-black-darkest font-bold' : '' }}"
                    >
                        <img src="{{ auth()->user()->avatar_path }}"
                             alt="{{ auth()->user()->username }}"
                             class="w-4 h-4 mr-3 bg-grey-dark rounded-full ">

                        My Threads
                    </a>
                </li>
            @endif

            <li class="pb-3">
                <a href="/threads?popular=1" class="flex items-center text-grey-darkest hover:text-red-light {{ Request::query('popular') ? 'text-black-darkest font-bold' : '' }}">
                    @include ('svgs.icons.star', ['class' => 'mr-3 text-yellow-dark'])
                    Popular Threads
                </a>
            </li>

            <li>
                <a href="/threads?unanswered=1" class="flex items-center text-grey-darkest hover:text-red-light  {{ Request::query('unanswered') ? 'text-black-darkest font-bold' : '' }}">
                    @include ('svgs.icons.question', ['class' => 'mr-3 text-grey-dark'])
                    Unanswered Threads
                </a>
            </li>
        </ul>
    </div>

    @if (count($trending))
        <div class="widget">
            <h4 class="widget-heading">Trending</h4>

            <ul class="p-0 pl-4 text-grey-dark mr-1 mb-5">
                @foreach ($trending as $thread)
                    <li class="pb-3 text-sm mb-2">
                        <a href="{{ url($thread->path) }}" class="hover:text-red-light no-underline text-grey-darkest ">
                            {{ $thread->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</aside>
