<nav class='border-b  h-14 shadow-sm px-4 flex  gap-4 items-center'>
    <x-dropdown class="text-slate-600 relative -mb-2">
        <x-slot name="trigger">
            <button aria-label="dropdown menu">
                <x-heroicon-o-bars-3 class=" h-8" />
            </button>
        </x-slot>
        <div class="absolute">

            <a href="#">Profile</a>
            <a href="#">
                <x-heroicon-m-cog-6-tooth class="h-4 inline-block" />
                Settings
            </a>
            <x-logout action="{{route('logout')}}" class="text-gray-500" />
        </div>
    </x-dropdown>
    
    <span class="text-slate-700 font-semibold">
         {{auth()->user()->username}}
    </span>
</nav>