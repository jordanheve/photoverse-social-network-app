<div class="container mx-auto flex items-center justify-between">

    <nav class=' h-14 flex  gap-4 items-center max-md:justify-evenly flex-grow'>
        
        @auth
    <x-dropdown class="text-slate-600 relative -mb-2 z-50">
        <x-slot name="trigger">
            <button aria-label="dropdown menu">
                <x-heroicon-o-bars-3 class=" h-8" />
            </button>
        </x-slot>
        <div x-cloak class="absolute w-36 p-4 bg-zinc-50 shadow text-zinc-500 gap-4 flex flex-col z-50" id="menu" >
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
    <a href="{{route('user.index', auth()->user())}}" class="max-sm:hidden">
        
        <span class="text-slate-700 font-semibold" >
            {{auth()->user()->username}}
        </span>
    </a>
    <a href="{{route('posts.create')}}" title="create a new post" aria-label="create a new post" >
        <span class="flex gap-2 items-center text-sm md:border border-slate-500  text-slate-700 p-1 rounded-full md:rounded hover:bg-slate-200"> <span class="max-md:hidden">Create</span>
        <x-heroicon-m-camera  class=" h-6 " />
    </span>
</a>
<livewire:user-search   />  


<a href="{{route('explore.index')}}"  title="explore" class="hover:bg-slate-200 rounded-full p-1">
    <x-heroicon-o-globe-asia-australia class="h-6 text-slate-700" />
</a>

<livewire:notifications/>
@endauth

@guest

<a class="hover:underline text-slate-800" href="{{route('sign-up')}}">
    Sign-up    
</a>
<a class="hover:underline text-slate-800" href="{{route('login')}}">
    Login    
</a>

@endguest

</nav>
<a href="{{route('feed')}}" class=" max-md:hidden text-3xl font-extralight italic text-center text-slate-700">Photoverse</a>
</div>