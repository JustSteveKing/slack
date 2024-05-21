@props(['title' => config('app.name'), 'channel' => 'general'])

<x-layouts.page class="flex" title="{{ $title }}">
    <livewire:workspace-list />
    <livewire:channel-list />


    <div class="flex-1 flex flex-col bg-slate-50 dark:bg-slate-900 overflow-hidden">
        <livewire:header :channel="$channel" />

        <div class="px-6 py-4 flex-1 overflow-y-auto">
            {{ $slot }}
        </div>
        <div class="pb-6 px-4 flex-none">
            <livewire:chat-input :channel="$channel" />
        </div>

    </div>

    <livewire:scripts />
</x-layouts.page>
