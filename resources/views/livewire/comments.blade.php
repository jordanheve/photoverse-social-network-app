<div class="bg-white">
    @auth
        
    <p class="text-xl text-center mb-4   font-semibold">
        Add a new comment
    </p>
    
    <form wire:submit.prevent="store">
        <x-custom-textarea
        name="comment" 
        id="comment" 
        placeholder="comment" 
        ariaLabel="comment"
        required
        />
        <x-register-button type='submit'>Comment</x-register-button>
    </form>
    @endauth

    <div >
       @if($comments->count())

        @foreach($comments as $comment)
        
            <div class="border-b py-2 ">
                <p class="font-semibold">
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
            <p>No hay comentarios</p>
    @endif
    
    </div>

</div>