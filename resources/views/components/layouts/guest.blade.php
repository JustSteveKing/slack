@props(['title' => config('app.name')])

<x-layouts.page title="{{ $title }}">
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <x-text.h2 class="mt-6 text-center">
                {{ $title }}
            </x-text.h2>
        </div>

        {{ $slot }}
    </div>
</x-layouts.page>
