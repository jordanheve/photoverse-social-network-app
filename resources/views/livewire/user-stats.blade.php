<div>
    <div class="flex justify-between gap-6">
        <p class="font-semibold text-slate-800">{{$user->username}}</p>

        @auth
        @if ($user->id !== auth()->id())
        
        @if($userFind->isFollowing(auth()->user()))

        <x-dropdown class="relative">
            <x-slot name='trigger'>
                <button aria-label="dropdown menu" class="text-sm gap-2  rounded flex bg-zinc-200 hover:bg-zinc-300 px-4 py-0.5 font-semibold text-zinc-800">
                    Following
                    <x-heroicon-m-chevron-down class="h-5 mt-0.5" />
                </button>
            </x-slot>
            
            <form x-cloak class="absolute modal" wire:submit.prevent="delete" method="POST">
                @method('DELETE')
                
                <button  class="bg-red-500 text-white p-1 text-sm font-semibold rounded-sm"  type="submit">
                    Unfollow
                </button>
            </form>
        </x-dropdown>
            
        @else

        <form  wire:submit.prevent="store" method="POST">
            <button   class="bg-sky-500 text-white p-1 text-sm font-semibold rounded-sm" type="submit">
                Follow
            </button>
        </form>

        @endif
        @endif
    
    @endauth

    </div>

    <div class="flex items-baseline">
            <x-stats-info 
        number="{{$postCount}}"
        name="{{($postCount === 1) ? 'Post' : 'Posts';}}"
        />
        <x-dropdown class="z-100">
           
            <x-slot name='trigger'>
                <button>
                    <x-stats-info 
                    number="{{$followersCount}}"
                    name="Followers"
                    />
                </button>
            </x-slot>

            <div x-cloak class="  absolute top-1/2 -translate-y-1/2 translate-x-1/2 right-1/2 modal z-50  bg-zinc-50 border rounded-lg shadow-lg max-w-sm w-full  ">
                <div class="relative flex flex-col  border-b h-10">
                    <button @click='open = false'>
                        <x-heroicon-s-x-mark class="h-6 absolute top-2 right-2" />
                    </button>
                    <p class="text-center font-bold my-auto" >Followers</p> 
                </div >
                <livewire:followers-view :userId="$user->id"/>
            </div>
        </x-dropdown>

        <x-dropdown>
            <x-slot name='trigger'>
                <button>

                    <x-stats-info 
                    number="{{$followingCount}}"
                    name="Following"
                    />
                </button>
            </x-slot>

            <div x-cloak class="  absolute top-1/2 -translate-y-1/2 translate-x-1/2 right-1/2 modal z-50  bg-zinc-50 border rounded-lg shadow-lg max-w-sm w-full ">
                <div class="relative flex flex-col  border-b h-10">
                    <button @click='open = false'>
                        <x-heroicon-s-x-mark class="h-6 absolute top-2 right-2" />
                    </button>
                    <p class="text-center font-bold my-auto" >Following</p> 
                </div >
                <livewire:following-view :userId="$user->id"/>
            </div>
        </x-dropdown>
        
       

        
    </div>
    <p class="text-slate-800">{{$user->name}}</p>
    <div class="max-w-xs text-xs text-zinc-500 italic">
        @if (auth()->id() ===  $user->id && !$user->description)
        <p >Your profile description is currently empty.
            <br>
            Add a description to personalize your profile.</p>
            @else
        <p>{{$user->description}}</p>
        @endif
    </div>



</div>
