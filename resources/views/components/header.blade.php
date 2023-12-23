<nav class='border-b  h-14 shadow-sm px-4 flex  gap-4 items-center'>
    
    @auth
    <x-dropdown class="text-slate-600 relative -mb-2">
        <x-slot name="trigger">
            <button aria-label="dropdown menu">
                <x-heroicon-o-bars-3 class=" h-8" />
            </button>
        </x-slot>
        <div x-cloak class="absolute w-32 p-4 bg-zinc-50 shadow" id="menu">
            <a  href="#">
               <p class="border-b">
                   Home
               </p>
                   
            </a>
            <a href="#">Profile</a>
            <a href="#" class="flex items-center">
                <x-heroicon-m-cog-6-tooth class="h-4 inline-block" />
                Edit profile
            </a>
            <a href="#" class="flex items-center">
                <x-heroicon-m-cog-6-tooth class="h-4 inline-block" />
                Settings
            </a>
            <x-logout action="{{route('logout')}}" class="text-gray-500" />
        </div>
    </x-dropdown>
    <a href="{{route('user.index', auth()->user())}}">

        <span class="text-slate-700 font-semibold">
            {{auth()->user()->username}}
        </span>
    </a>
    <a href="{{route('posts.create')}}">
        <span class="flex gap-2 items-center text-sm border border-slate-600 p-1 rounded">Create
            <x-heroicon-m-camera  class=" h-5" />
        </span>
    </a>
    <livewire:user-search   />  
    @endauth

    @guest
        Registarse    
    @endguest
</nav>