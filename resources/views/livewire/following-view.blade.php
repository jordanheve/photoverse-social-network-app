<div class="overflow-y-auto max-h-96 flex flex-col gap-4  p-4">

    @if($followings->count())
    
        @foreach($followings as $following)

            <div class="flex gap-4 ">
                <div>
                    @if($following->image)

                    <img class="rounded-full h-12 w-12 object-cover" src="{{asset('storage').'/uploads'.'/'.$following->id.'/'.'profile/'.$following->image}}" alt="{{'user '.$following->username.' profile picture'}}">
                    @else
                    <img src="/img/profile-picture.png" class="rounded-full objet-cover h-12 w-12" alt="profile picture">
                    @endif
                </div>
                <div class="flex items-center flex-grow justify-between">
                    <div>

                        <p class="font-semibold text-zinc-700">
                            {{$following->username}}
                        </p>
                        <p class="-mt-1 text-zinc-500 text-sm">
                            {{ $following->name }}
                        </p>
                        
                    </div>
                       
              @auth
                  
              @if($following->id !== auth()->id())
              
              @if($following->isFollowing(auth()->user()))
              
              <x-dropdown class="relative">
                  <x-slot name='trigger'>
                      <button  aria-label="dropdown menu" class="text-sm gap-2  rounded flex bg-zinc-200 hover:bg-zinc-300 px-4 py-0.5 font-semibold text-zinc-800">
                          Following
                          <x-heroicon-m-chevron-down class="h-5 mt-0.5" />
                        </button>
                    </x-slot>
                    
                    <form x-cloak class="absolute modal" wire:submit.prevent="delete({{ $following->id }})" method="POST">
                        @method('DELETE')
                        
                        <button  class="bg-red-500 text-white p-1 text-sm font-semibold rounded-sm"  type="submit">
                            Unfollow
                        </button>
                    </form>
                </x-dropdown>
                
                @else
                
                <form  wire:submit.prevent="store({{ $following->id }})" method="POST">
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
