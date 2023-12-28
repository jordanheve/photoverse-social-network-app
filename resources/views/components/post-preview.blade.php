@props(['post'])

<a class="" href="{{ route('user.show', ['user' => $post->user, 'post' => $post]) }}">
    <figure class="rounded-lg relative aspect-square overflow-hidden transition-all duration-300 cursor-pointer group z-30">
        <div class="relative h-full">
            <div class='bg-gradient-to-t from-black opacity-50 to-30% h-full w-full absolute z-10'></div>
            <img class="rounded-lg object-cover h-full w-full transform transition duration-300 ease-in-out group-hover:scale-110" src="{{ asset('storage') . '/uploads' . '/' . $post->user_id . '/' . $post->image }}" alt="{{$post->title}} picture">
            <figcaption class="opacity-80 absolute px-2 md:px-4 md:text-lg text-xs text-white bottom-2 md:bottom-6 z-20">
                <p class=" mb-2 font-semibold">{{ $post->title }}</p>
                <p class="flex items-center gap-2">
                    <x-heroicon-s-user class="h-3 md:h-4" />    
                    {{$post->user->username}}
                </p>
            </figcaption>
        </div>
    </figure>
</a>
