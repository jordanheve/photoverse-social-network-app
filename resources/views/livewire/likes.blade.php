

<div class="flex gap-2">
    @auth
    @if ($post->checkLike())
    <form method="POST" wire:submit.prevent="destroy">
        @method('DELETE')
        <button type="submit">
        <x-heroicon-s-heart class="h-6 text-red-500" />
        </button>
    </form>
    @else
    <form wire:submit.prevent="store">
        <button type="submit">
            <x-heroicon-o-heart class="h-6" />
        </button>
    </form>
    @endif
    @endauth
    <p>
        <span class="font-semibold">{{$post->likes->count()}}</span>
        @if($post->likes->count() === 1)
        Like
        @else
        Likes
        @endif
    </p>
</div>
