@props(['heading','subheading','action' => null])

<div class="mx-auto max-w-md sm:max-w-3xl">
    <div>
        <div class="text-center">
            <x-icons.people class="mx-auto h-12 w-12 text-gray-400" />
            <h2 class="mt-2 text-base font-semibold leading-6 text-gray-900">
                {{ $heading }}
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                {{ $subheading }}
            </p>
        </div>
    </div>
    @if ($action)
        <div class="mt-10">
            {!! $action !!}
        </div>
    @endif
</div>
