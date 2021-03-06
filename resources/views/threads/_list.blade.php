@forelse ($threads as $thread)
    <div class=" flex {{ $loop->last ? '' : 'border border-grey-lighter shadow p-8 mb-6 pb-4' }}">
        <div class="mr-4 ">
            <img src="{{ $thread->creator->avatar_path }}"
                     alt="{{ $thread->creator->username }}"
                     class="w-8 h-8 border-solid rounded-full ">
        </div>

        <div class= "flex-1 ">
            <h3 class="text-xl font-normal mb-2 tracking-tight">
                <a href="{{ $thread->path() }}" class="text-blue">
                    @if ($thread->pinned)
                        Pinned:
                    @endif

                    @if (auth()->check() && $thread->hasUpdatesFor(auth()->user()))
                        <span class="text  text-blue-dark mb-4">
                            {{ $thread->title }}
                        </span>
                    @else
                    <span class="text  text-blue-light mb-4">
                        {{ $thread->title }}
                        
                    </span>
                    @endif
                </a>
            </h3>

            <p class="text-2xs text-grey-darkest mb-4">
                Posted By: <a href="{{ route('profile', $thread->creator) }}" class="text-red-light">{{ $thread->creator->username }}</a>
            </p>

            <thread-view :thread="{{ $thread }}" inline-template class="mb-6 text-grey-darkest leading-loose pr-8">
                <highlight :content="body"></highlight>
            </thread-view>

            <div class="flex items-center text-xs mb-6">
                <a class="btn is-outlined hover:bg-red-light text-grey-darker py-2 px-3 mr-4 text-2xs flex items-center" href="/threads/{{ $thread->channel->slug }}">
                    <span class="rounded-full h-2 w-2 mr-2  hover:bg-white" style="background: {{ $thread->channel->color }}"></span>

                    {{ ucwords($thread->channel->name) }}
                </a>

                <span class="mr-2 flex items-center text-grey-darker text-2xs font-semibold mr-4">
                    @include ('svgs.icons.eye', ['class' => 'mr-2'])
                    {{ $thread->visits }} visits
                </span>

                <a href="{{ $thread->path() }}" class="mr-2 flex items-center text-grey-darker text-2xs font-semibold">
                        @include ('svgs.icons.book', ['class' => 'mr-2'])
                        {{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count) }}
                    </a>

                <a class=" btn ml-auto is-outlined hover:bg-red-light text-grey-darkest py-2 text-xs" href="{{ $thread->path() }}">read more</a>
            </div>
        </div>
    </div>
@empty
    <p>There are no relevant results at this time.</p>
@endforelse
