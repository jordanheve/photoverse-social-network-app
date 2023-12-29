@props([
    'number',
    'name'
])


    <span class="mr-2 text-zinc-700 text-sm max-md:flex max-md:flex-col max-md:items-center max-md:mr-2">
        <span class="font-semibold">{{ $number }}</span>
        <span class="text-slate ">{{ $name }}</span>
    </span>
