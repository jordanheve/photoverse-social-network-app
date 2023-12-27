<div >


    <form wire:submit.prevent="store" novalidate class="flex justify-center items-center gap-10 m-4">
        <div class="w-96">
            <h2>Profile picture</h2>
            
            <p>Current profile picture</p>

            @if (auth()->user()->image)
                
            <img class="rounded-full h-40 w-40 object-cover mx-auto" src="{{asset('storage').'/uploads'.'/'.auth()->id().'/'.'profile/'.auth()->user()->image}}" alt="profile picture">
            @else
            <img src="/img/profile-picture.png" class="rounded-full objet-cover h-40 w-40" alt="profile picture">
            @endif
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
            
        </div>
       
       
    </form>


</div>

@script
<script>
    $wire.on('userUpdated', (username)=>{
        Swal.fire({
        position: "center",
        icon: "success",
        title: "User data updated successfully!",
        showConfirmButton: true,
        timer: 3000
});

setTimeout(() => {
        window.location.href= username[0]['userProfile']
    }, 3000);

    });

</script>

@endscript