<div>
    <div>
        <p class="font-semibold">{{$user->username}}</p>
    </div>

    <div>
            <x-stats-info 
        number="{{$postCount}}"
        name="{{($postCount === 1) ? 'Post' : 'Posts';}}"
        />

        <x-stats-info 
        number="{{$followersCount}}"
        name="Followers"
        />
        <x-stats-info 
        number="{{$followingCount}}"
        name="Following"
        />

        
    </div>
    <p>{{$user->name}}</p>
    <div class="max-w-xs text-xs text-zinc-500 italic">
        @if (auth()->id() ===  $user->id && !$user->description)
        <p >Your profile description is currently empty.
            <br>
            Add a description to personalize your profile.</p>
            @else
        <p>{{$user->description}}</p>
        @endif
    </div>
    @auth
        @if ($user->id !== auth()->id())
        
        @if($userFind->isFollowing(auth()->user()))
        <form wire:submit.prevent="delete" method="POST">
            @method('DELETE')
            <button class="bg-red-500 text-white p-1 text-sm font-semibold rounded-sm" wire:submit.prevent="store" type="submit">
                Unfollow
            </button>
        </form>

        @else
        
        <form wire:submit.prevent="store" method="POST">
            <button class="bg-sky-500 text-white p-1 text-sm font-semibold rounded-sm" wire:submit.prevent="store" type="submit">
                Follow
            </button>
        </form>

        @endif
        @endif
    
    @endauth
    

</div>
