<div >


    <form wire:submit.prevent="store" novalidate class="flex justify-center items-center gap-10 m-4">
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
                    name="Name" 
                    id="name" 
                    placeholder="Name" 
                    ariaLabel="Name" 
                    value='{{auth()->user()->name}}'
                    />
                    @error('Name')
                    <x-alert-message >
                        {{$message}}
                    </x-alert-message>
                    @enderror
                </div>
            
                <div>
                    <x-custom-input 
                    type="text" 
                    name="username" 
                    id="username" 
                    placeholder="Username" 
                    ariaLabel="Username"
                    value='{{auth()->user()->username}}'
                    />
                    @error('Name')
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
                value='{{auth()->user()->description}}'
                />
    
                    @error('description')
                    <x-alert-message >
                        {{$message}}
                    </x-alert-message>
                    @enderror
    
                <x-register-button type='submit'>Save Changes</x-register-button>
            
            </div>
           
            
        </div>
       
       
    </form>


</div>
