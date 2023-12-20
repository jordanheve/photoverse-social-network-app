@props([
    'name',
    'id',
    'placeholder',
    'ariaLabel',
])

<div class="w-full">
   

    <textarea
    class="resize-none w-full text-xs outline-none p-2 rounded-sm border-zinc-300 border bg-zinc-100" 
            wire:model="{{$name}}"
            id="{{$id}}"
            placeholder="{{$placeholder}}" 
            aria-label={{$ariaLabel}}
            rows="3"
    ></textarea>
    
</div>

