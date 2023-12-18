<form wire:submit.prevent="create" novalidate class="flex items-center gap-10 m-4">
    <div class="w-96">

        
        <x-filepond wire:model='image'/>
    
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
                <x-alert-message >
                    
                </x-alert-message>
            </div>
        
                
                <textarea 
                wire:model='description'
                class="resize-none w-full text-xs outline-none p-2 rounded-sm border-zinc-300 border bg-zinc-100" 
                placeholder="Description" id="description"  rows="3"></textarea>
                
            <x-register-button type='submit'>Post</x-register-button>
        
        </div>
       
        
    </div>
   
   
</form>
