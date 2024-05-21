<x-layouts.guest title="Log into your account">
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
        <div class="bg-slate-100 dark:bg-slate-800 px-6 py-12 shadow sm:rounded-lg sm:px-12">
            <div class="mt-6 grid grid-cols-2 gap-4">
                <a href="{{ route('pages:oauth:github:redirect') }}" class="flex w-full items-center justify-center gap-3 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:ring-transparent">
                    <x-icons.github class="h-5 w-5 fill-[#24292F]" />
                    <span class="text-sm font-semibold leading-6">GitHub</span>
                </a>
            </div>
        </div>

        <p class="mt-10 text-center text-sm text-gray-500">
            Not a member?
            <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start a 14 day free trial</a>
        </p>
    </div>
</x-layouts.guest>
