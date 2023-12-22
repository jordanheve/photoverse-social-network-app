@props(['post'])

<a class="" href="{{ route('user.show', ['user' => $post->user, 'post' => $post]) }}">
    <figure class="rounded-lg relative max-w-sm w-72 h-72 overflow-hidden transition-all duration-300 cursor-pointer group z-30">
        <div class="relative h-full">
            <div class='bg-gradient-to-t from-black opacity-50 to-30% h-full w-full absolute z-10'></div>
            <img class="rounded-lg object-cover h-full transform transition duration-300 ease-in-out group-hover:scale-110" src="{{ asset('storage') . '/uploads' . '/' . $post->user_id . '/' . $post->image }}" alt="image description">
            <figcaption class="absolute px-4 text-lg text-white bottom-6 z-20">
                <p>{{ $post->title }}</p>
            </figcaption>
        </div>
    </figure>
</a>
