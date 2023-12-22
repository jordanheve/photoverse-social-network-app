<div class="overflow-y-auto max-h-96 flex flex-col gap-4  p-4">

    @if($followers->count())
    
        @foreach($followers as $follower)

            <div class="flex gap-4 ">
                <div>
                    @if($follower->image)

                    <img class="rounded-full h-12 w-12 object-cover" src="{{asset('storage').'/uploads'.'/'.$follower->id.'/'.'profile/'.$follower->image}}" alt="{{'user '.$follower->username.' profile picture'}}">
                    @else
                    <img src="/img/profile-picture.png" class="rounded-full objet-cover h-12 w-12" alt="profile picture">
                    @endif
                </div>
                <div class="flex items-center flex-grow justify-between">
                    <div>

                        <p class="font-semibold text-zinc-700">
                            {{$follower->username}}
                        </p>
                        <p class="-mt-1 text-zinc-500 text-sm">
                            {{ $follower->name }}
                        </p>
                        
                    </div>
                       
              @auth
                  
              @if($follower->id !== auth()->id())
              
              @if($follower->isFollowing(auth()->user()))
              
              <x-dropdown class="relative">
                  <x-slot name='trigger'>
                      <button  aria-label="dropdown menu" class="text-sm gap-2  rounded flex bg-zinc-200 hover:bg-zinc-300 px-4 py-0.5 font-semibold text-zinc-800">
                          Following
                          <x-heroicon-m-chevron-down class="h-5 mt-0.5" />
                        </button>
                    </x-slot>
                    
                    <form x-cloak class="absolute modal" wire:submit.prevent="delete({{ $follower->id }})" method="POST">
                        @method('DELETE')
                        
                        <button  class="bg-red-500 text-white p-1 text-sm font-semibold rounded-sm"  type="submit">
                            Unfollow
                        </button>
                    </form>
                </x-dropdown>
                
                @else
                
                <form  wire:submit.prevent="store({{ $follower->id }})" method="POST">
                    <button class="bg-sky-500 text-white p-1 text-sm font-semibold rounded-sm" type="submit">
                        Follow
                    </button>
                </form>
                @endif
                @endif 
                
                @endauth          
            </div>
        </div>
        @endforeach
    
    @else
    <p>No followers yet</p>
    @endif

</div>
