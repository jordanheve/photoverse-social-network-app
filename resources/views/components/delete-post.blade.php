@props([
    'post'
])

<x-dropdown>
    <x-slot name='trigger'>
    <button
    
    title="delete this post" aria-label="click to delete this post">
        <x-heroicon-o-trash  class="text-slate-500 h-5" title="Delete this post"/>
    </button>
    </x-slot>    
    <div x-cloak id='delete' class="absolute bg-white border border-slate-800 bottom-1/2 right-1/2 translate-x-1/2 translate-y-1/2 p-8">
        <p>Are you sure want to delete the post?  </p>
        <div class="flex justify-evenly">

            <form method="POST" action="{{route('posts.destroy', $post)}}">
               @csrf
                @method('DELETE')
                <button type="submit" class="bg-teal-500 p-1 rounded text-white font-semibold">Yes</button>

            </form>
            <button class="bg-zinc-500 p-1 rounded text-white font-semibold" @click='open = false'>No</button>
        </div>
    </div>
</x-dropdown>

