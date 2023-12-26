<div class="relative z-50">
    <x-dropdown>
        <x-slot name='trigger'>
            <button class="flex"><x-heroicon-o-magnifying-glass class="h-5"/></button>
        </x-slot>
        <div x-cloak class="bg-white absolute top-0 left-6">
            <form role="search"></form>
            <input wire:model.live="search" type="search" class="bg-zinc-100" placeholder="Search">
            <div>
                
                @foreach ($users as $user)
                    <x-user-preview :user="$user"/>
            @endforeach
            </div>

        </div>


    </x-dropdown>
    
</div>
