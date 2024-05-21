<div class="bg-indigo-800 text-purple-400 flex-none w-64 pb-6 hidden md:block">
    <div class="text-white mb-2 mt-3 px-4 flex justify-between">
        <div class="flex-auto">
            <h1 class="font-semibold text-xl leading-tight mb-1 truncate">
                {{ $this->workspace->name }}
            </h1>
            <div class="flex items-center mb-6">
                <span class="bg-green-500 rounded-full block w-2 h-2 mr-2"></span>
                <span class="text-white opacity-50 text-sm">
                    {{ '@' . $this->user->handle }}
                </span>
            </div>
        </div>
    </div>
    <div class="mb-8">
        <div class="px-4 mb-2 text-white flex justify-between items-center">
            <div class="opacity-75">Channels</div>
            <x-icons.plus class="h-4 w-4 opacity-50" />
        </div>

        <div class="w-full flex flex-col items-start justify-center space-y-2">
            @foreach($this->channels as $channel)
                <a wire:navigate href="{{ route('pages:channels:show', $channel['reference']) }}" class="flex items-center space-x-2 bg-teal-dark py-1 px-4 text-white">

                    <x-dynamic-component
                        class="h-3"
                        :component="$channel->public() ? 'icons.hash' : 'icons.locked'"
                    />
                    <span>{{ $channel->reference }}</span>
                </a>
            @endforeach
        </div>

    </div>
    <div class="mb-8">
        <div class="px-4 mb-2 text-white flex justify-between items-center">
            <div class="opacity-75">Direct Messages</div>
            <x-icons.plus class="h-4 w-4 opacity-50" />
        </div>
        <div class="flex items-center mb-3 px-4">
            <span class="bg-green rounded-full block w-2 h-2 mr-2"></span>
            <span class="text-white opacity-75">Adam Wathan <span class="text-grey text-sm">(you)</span></span>
        </div>
    </div>
    <div>
        <div class="px-4 mb-2 text-white flex justify-between items-center">
            <div class="opacity-75">Apps</div>
            <x-icons.plus class="h-4 w-4 opacity-50" />
        </div>
    </div>
</div>
