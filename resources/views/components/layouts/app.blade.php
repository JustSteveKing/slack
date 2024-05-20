@props(['title' => config('app.name')])

<x-layouts.page class="flex" title="{{ $title }}">
    <div class="bg-indigo-900 text-purple-400 flex-none w-24 p-6 hidden md:block">
        <div class="cursor-pointer mb-4">
            <div class="bg-white h-12 w-12 flex items-center justify-center text-black text-2xl font-semibold rounded-lg mb-1 overflow-hidden">
                <img src="https://pbs.twimg.com/profile_images/895274026783866881/E1G1nNb0_400x400.jpg" alt="">
            </div>
            <div class="text-center text-white opacity-50 text-sm">&#8984;1</div>
        </div>
        <div class="cursor-pointer mb-4">
                <div
                    class="bg-white h-12 w-12 flex items-center justify-center text-black text-2xl font-semibold rounded-lg mb-1 overflow-hidden">
                    P
                </div>
            <div class="text-center text-white opacity-50 text-sm">&#8984;1</div>
        </div>
        <div class="cursor-pointer">
            <div
                class="bg-white opacity-25 h-12 w-12 flex items-center justify-center text-black text-2xl font-semibold rounded-lg mb-1 overflow-hidden">
                <svg class="fill-current h-10 w-10 block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="bg-indigo-800 text-purple-400 flex-none w-64 pb-6 hidden md:block">
        <div class="text-white mb-2 mt-3 px-4 flex justify-between">
            <div class="flex-auto">
                <h1 class="font-semibold text-xl leading-tight mb-1 truncate">
                    Workspace Name
                </h1>
                <div class="flex items-center mb-6">
                    <span class="bg-green-500 rounded-full block w-2 h-2 mr-2"></span>
                    <span class="text-white opacity-50 text-sm">
                    User Handle
                </span>
                </div>
            </div>
        </div>
        <div class="mb-8">
            <div class="px-4 mb-2 text-white flex justify-between items-center">
                <div class="opacity-75">Channels</div>
                <x-icons.plus class="h-4 w-4 opacity-50" />
            </div>

                <div class="bg-teal-dark py-1 px-4 text-white"># general</div>

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


    <div class="flex-1 flex flex-col bg-slate-50 dark:bg-slate-900 overflow-hidden">
        <div class="border-b border-slate-300 dark:border-slate-700 flex px-6 py-2 items-center flex-none">
            <div class="flex flex-col">
                <h3 class="mb-1 font-bold">#general</h3>
                <div class="text-sm truncate">
                    Chit-chattin' about ugly HTML and mixing of concerns.
                </div>
            </div>
        </div>

        <div class="px-6 py-4 flex-1 overflow-y-auto">
            {{ $slot }}
        </div>
        <div class="pb-6 px-4 flex-none">
            <div class="flex rounded-lg border-2 border-gray-300 dark:border-gray-700 overflow-hidden">
        <span class="text-3xl border-r-2 border-gray-300 dark:border-gray-700 p-2">
        <svg class="fill-current h-6 w-6 block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z"/></svg>
        </span>
                <input type="text" class="w-full px-4" placeholder="Message #general" />
            </div>
        </div>

    </div>

    <livewire:scripts />
</x-layouts.page>
