<div class="bg-white ">
    <p class="text-xl text-center mb-4  text-slate-800 font-semibold">
        Comments
    </p>
    @auth
        
    
    
    <form wire:submit.prevent="store">
        <x-custom-textarea
        name="comment" 
        id="comment" 
        placeholder="add a new comment" 
        ariaLabel="add a new comment"
        required
        />
        <x-register-button type='submit'>Comment</x-register-button>
    </form>
    @endauth

    <div >
       @if($comments->count())

        @foreach($comments as $comment)
        
            <div class="border-b py-2 text-slate-800">
                <p class="font-semibold ">
                    <a href="{{route('user.index',  $comment->user)}}">
                        {{$comment->user->username}}
                    </a>
                </p>
                <p>{{ $comment->comment }}</p>
                <p class="text-xs text-slate-500">{{$comment->created_at->diffForHumans()}}</p>
            </div>
        @endforeach
        <div class="mt-3">
            {{ $comments->links() }}
        </div>
    @else
            <p class="text-center text-zinc-400 italic my-10">No comments yet</p>
    @endif
    
    </div>

</div>