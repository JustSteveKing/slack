<ul
    x-data="{ channel: @entangle('channel') }"
    class="space-y-6"
    role="list"
    x-ref="messages"
    aria-roledescription="A list of messages for the channel"
>
    @forelse($this->messages as $message)
        <li>
            <x-ui.message
                user="{{ $message->user->handle }}"
                avatar="{{ $message->user->avatar }}"
                datetime="{{ $message->created_at->diffForHumans() }}"
                content="{{ $message->content }}"
            />
        </li>
    @empty
        <li>
            <x-ui.empty-state
                heading="Seems quiet"
                subheading="Why not be the first to send a message?"
            >
                <h3 class="text-sm font-medium text-gray-500">Join other channels</h3>
                <ul role="list" class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    @foreach ($this->channels as $channel)
                        <li>
                            <button type="button" class="group flex w-full items-center justify-between space-x-3 rounded-full border border-gray-300 p-2 text-left shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span class="flex min-w-0 flex-1 items-center space-x-3">
                                    <span class="block flex-shrink-0">
                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    </span>
                                    <span class="block min-w-0 flex-1">
                                        <span class="block truncate text-sm font-medium text-gray-900">Lindsay Walton</span>
                                        <span class="block truncate text-sm font-medium text-gray-500">Front-end Developer</span>
                                    </span>
                                </span>
                                <span class="inline-flex h-10 w-10 flex-shrink-0 items-center justify-center">
                                    <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                    </svg>
                                </span>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </x-ui.empty-state>
        </li>
    @endforelse
</ul>

@push('scripts')
<script>
    const channel = {
        isTyping: false,

        usersTyping: [],

        channel: null,

        init() {
            this.scrollPosition()
            this.listenForEvents()
        },

        listenForEvents() {
            this.channel = Echo.private(`channels.{{ $channel->name }}`)

            this.channel.listen('MessageSent', (e) => {
                this.$wire.messages.push(e.message)
            }).listenForWhisper('start typing', (e) => {
                this.usersTyping = this.usersTyping.filter(
                    (user) => user.id !== e.id
                )

                this.usersTyping.push(e)
            })
        }
    }
</script>
@endpush
