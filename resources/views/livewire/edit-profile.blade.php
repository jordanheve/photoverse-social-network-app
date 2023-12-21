<div >


    <form wire:submit.prevent="store" novalidate class="flex justify-center items-center gap-10 m-4">
        <div class="w-96">
            <h2>Profile picture</h2>
            
            <p>Current profile picture</p>



            <p>update</p>
            <x-filepond wire:model='image'/>
            @error('image')
            <x-alert-message> {{$message}}</x-alert-message>
            @enderror
    </div>
    
        <div>
            <div class="border p-6 max-w-md w-96  gap-2 flex flex-col">
                
            
                <div>
                    <label for="name" class="text-sm font-semibold text-slate-700">Name:</label>
                    <x-custom-input 
                    type="text" 
                    name="name" 
                    id="name" 
                    placeholder="Name" 
                    ariaLabel="Name" 
                   
                    />
                    @error('Name')
                    <x-alert-message >
                        {{$message}}
                    </x-alert-message>
                    @enderror
                </div>
            
                <div>
                    <label for="username" class="text-sm font-semibold text-slate-700">Username:</label>
                    <x-custom-input 
                    type="text" 
                    name="username" 
                    id="username" 
                    placeholder="Username" 
                    ariaLabel="Username"
                   
                    />
                    @error('username')
                    <x-alert-message >
                        {{$message}}
                    </x-alert-message>
                    @enderror
                </div>
               
                <div>
                    <label for="description" class="text-sm font-semibold text-slate-700">Description:</label>
                    <x-custom-textarea
                    name="description" 
                    id="description" 
                    placeholder="Description" 
                    ariaLabel="Description"
                    />
                    
                    @error('description')
                    <x-alert-message >
                        {{$message}}
                    </x-alert-message>
                    @enderror
                </div>      
    
                <x-register-button type='submit'>Save Changes</x-register-button>
            
            </div>
           <p class="text-xs text-slate-500">Update password here</p>
            
        </div>
       
       
    </form>


</div>
