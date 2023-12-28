<div class="md:relative z-50">
    <x-dropdown>
        <x-slot name='trigger' >
            <button class="flex  hover:bg-slate-200 rounded-full p-1" title="search users" aria-label="search-users"><x-heroicon-o-magnifying-glass class="h-6 text-slate-700"/></button>
        </x-slot>
        <div x-cloak class="bg-white p-2 absolute top-14 max-md:translate-x-1/2 max-md:right-1/2 md:top-0 md:left-6">
            
            <input wire:model.live="search" type="search" class="bg-zinc-100 p-2" aria-label="Search for a user" placeholder="Search" class="my-2">
            <div >
                
                @foreach ($users as $user)
                    <x-user-preview :user="$user"/>
            @endforeach
            </div>

        </div>


    </x-dropdown>
    
</div>
