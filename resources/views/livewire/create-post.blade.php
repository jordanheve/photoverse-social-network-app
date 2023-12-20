<form wire:submit.prevent="store" novalidate class="flex items-center gap-10 m-4">
    <div class="w-96">

        
        <x-filepond wire:model='image'/>
        @error('image')
        <x-alert-message> {{$message}}</x-alert-message>
        @enderror
</div>

    <div>
        <div class="border p-6 max-w-md w-96  gap-2 flex flex-col">
            
        
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
