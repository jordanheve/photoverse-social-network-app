
    <a href="{{ route('user.index', $user) }}" class="flex gap-4 my-2 ">
        <div>
            @if($user->image)
                <img class="rounded-full h-12 w-12 object-cover" src="{{ asset('storage/uploads/' . $user->id . '/profile/' . $user->image) }}" alt="{{ 'user ' . $user->username . ' profile picture' }}">
            @else
                <img src="/img/profile-picture.png" class="rounded-full object-cover h-12 w-12" alt="profile picture">
            @endif
        </div>
        <div class="flex items-center flex-grow justify-between">
            <div>
                <p class="font-semibold text-zinc-700">
                    {{ $user->username }}
                </p>
                <p class="-mt-1 text-zinc-500 text-sm">
                    {{ $user->name }}
                </p>
            </div>
        </div>
    </a>