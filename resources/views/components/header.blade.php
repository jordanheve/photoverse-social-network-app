<nav class='border-b  h-14 shadow-sm px-4 flex  gap-4 items-center'>
    
    @auth
    <x-dropdown class="text-slate-600 relative -mb-2">
        <x-slot name="trigger">
            <button aria-label="dropdown menu">
                <x-heroicon-o-bars-3 class=" h-8" />
            </button>
        </x-slot>
        <div x-cloak class="absolute w-36 p-4 bg-zinc-50 shadow text-zinc-500 gap-4 flex flex-col" id="menu" >
            <a href="{{route('feed')}}" class="flex items-center gap-2 hover:bg-zinc-200">
                <x-heroicon-m-home class="h-4 ml-1 -mb-0.5" />
                Home
            </a>
            <a href="{{route('user.index', auth()->user())}}" class="flex items-center gap-2 hover:bg-zinc-200">
                <x-heroicon-s-user class="h-4  ml-1 -mb-0.5 " />
                Profile
            </a>
            <a  href="{{route('edit.index')}}" class="flex items-center gap-2 hover:bg-zinc-200">
                <x-heroicon-m-pencil-square class="h-4  ml-1 -mb-0.5" />
                Edit profile
            </a>
            <a href="{{route('settings.index')}}" class="flex items-center gap-2 hover:bg-zinc-200">
                <x-heroicon-m-cog-6-tooth class="h-4  ml-1 -mb-0.5 " />
                Settings
            </a>
                <x-logout action="{{route('logout')}}" class="flex items-center gap-2 hover:bg-zinc-200 w-full" >
                    <x-heroicon-m-arrow-left-on-rectangle class="h-4 ml-1 -mb-0.5" />
                    Log Out
                </x-logout>
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

   <livewire:notifications/>

    @endauth

    @guest
        Registarse    
    @endguest
</nav>