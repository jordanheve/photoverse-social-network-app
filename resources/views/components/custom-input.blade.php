@props([
    'type',
    'name',
    'id',
    'placeholder',
    'ariaLabel',
    'attributes'=>"",
    'value'=>""
])

<div class="w-full">
    <input 
        class="w-full text-xs outline-none p-2 rounded-sm border-zinc-300 border bg-zinc-100" 
        type="{{ $type }}" 
        wire:model="{{ $name }}" 
        id="{{ $id }}" 
        placeholder="{{ $placeholder }}" 
        aria-label="{{ $ariaLabel }}"
        {{ $attributes }}
        value="{{$value}}"
    >
    
</div>

