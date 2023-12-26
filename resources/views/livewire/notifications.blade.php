<div >
    <x-dropdown >
        <x-slot name='trigger'>
            <button wire:click="markAsRead" aria-label="notifications" title="notifications" class="relative mt-1 pt-0.5">
                <x-heroicon-o-bell class="h-6"/>
                @if ($unreadNotificationsCount)
                <span  class="bg-red-500 rounded-full text-xs px-1 text-zinc-50 absolute top-0 font-semibold">
                    {{$unreadNotificationsCount}}
                </span>
                @endif
            </button>
        </x-slot>
        <div x-cloak class="absolute bg-zinc-50 shadow-md p-2 z-50">
            @forelse ($notifications as $notification )
            @php
            $notificationData = json_decode($notification->data, true);
            @endphp

                @if ($notification->type == "like")
                    
                <div>
                    <a class="flex items-center gap-2 hover:bg-zinc-200 p-2" href="{{route("user.show", ['user'=>auth()->user(), "post" => $notificationData['post_id']])}}">
                        <div class="bg-red-400 rounded-full p-1">
                            <div class="h-8 w-8 pt-0.5 flex items-center">
                                <x-heroicon-o-heart class="h-full text-zinc-50 mx-0.5" />
                            </div>
                        </div>
                        <p>{{$notificationData["message"]}}</p>

                    </a>
                </div>
                @endif

                @if ($notification->type == "comment")
                    
                <div>
                    <a class="flex items-center gap-2 hover:bg-zinc-200 p-2" href="{{route("user.show", ['user'=>auth()->user(), "post" => $notificationData['post_id']])}}">
                        <div class="bg-yellow-400 rounded-full p-1">
                            <div class="h-8 w-8 pb-0.5 flex items-center">
                                <x-heroicon-o-chat-bubble-oval-left-ellipsis class="h-full text-zinc-50 mx-0.5" />
                            </div>
                        </div>
                        <p>{{$notificationData["message"]}}</p>

                    </a>
                </div>
                @endif

                @if ($notification->type == "follow")
                    
                <div>
                    @php
                        $notificationUser = App\Models\User::find($notificationData["user_id"]);
                    @endphp
                    <a class="flex items-center gap-2 hover:bg-zinc-200 p-2" href="{{route("user.index", $notificationUser)}}">
                        <div class="bg-blue-400 rounded-full p-1">
                            <div class="h-8 w-8 pl-0.5 flex items-center">
                                <x-heroicon-o-user-plus class="h-full text-zinc-50 mx-0.5" />
                            </div>
                        </div>
                        <p>{{$notificationData["message"]}}</p>

                    </a>
                </div>

                @endif
                @empty
                No hay notificaciones que mostrar
                @endforelse
                @if ($notifications->count())
                <form wire:submit.prevent="destroy" class="flex justify-center" method="POST">
                    @method("DELETE")
                    <button type='submit' class="text-sky-600 font-semibold hover:underline">Clear all</button>
                </form>
                    
                @endif
        </div>
    </x-dropdown>
</div>
