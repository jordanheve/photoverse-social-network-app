<form wire:submit.prevent="store" novalidate class="flex max-lg:flex-col items-center gap-10 m-4 justify-center container mx-auto">
    <div class="w-full max-w-md">

        
        <x-filepond wire:model='image'/>
        @error('image')
        <x-alert-message> {{$message}}</x-alert-message>
        @enderror
</div>

    <div class="max-w-md w-full ">
        <div class="border p-6  gap-2 flex flex-col">
            
        
            <div>
                <x-custom-input 
                type="text" 
                name="title" 
                id="title" 
                placeholder="Title" 
                ariaLabel="Title"
                required
                />
                @error('title')
                <x-alert-message >
                    {{$message}}
                </x-alert-message>
                @enderror
            </div>
        
                
           
                
            <x-custom-textarea
            name="description" 
            id="description" 
            placeholder="Description" 
            ariaLabel="Description"
            required
            />

                @error('description')
                <x-alert-message >
                    {{$message}}
                </x-alert-message>
                @enderror

            <x-register-button type='submit'>Post</x-register-button>
        
        </div>
       
        
    </div>
   
   
</form>
