@props([
    'user',
    'avatar',
    'datetime',
    'content',
])

<div class="flex items-start mb-4 text-sm">
    <x-ui.avatar :src="$avatar" :alt="$user" />
    <div class="flex-1 overflow-hidden">
        <div>
            <span class="font-bold">{{ $user }}</span>
            <span class="text-xs">{{ $datetime }}</span>
        </div>
        <p class="leading-normal">
            {!! $content !!}
        </p>
    </div>
</div>
