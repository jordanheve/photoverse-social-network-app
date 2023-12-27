<div class="border px-9 py-10 max-w-sm flex flex-col gap-4 justify-center items-center mx-auto" >
    @if ($email !== null)
        <h2 class="font-semibold text-xl">Password Reset</h2>
        <form wire:submit.prevent="store" novalidate class="flex flex-col gap-2 w-full">
            <div>
                <label for="new_password" class="text-xs text-center my-6 text-zinc-800">
                    <p >
                        Please enter your new password for the user associated with the email address:  {{$email}}
                    </p>
                </label>
            </div>
            <div> 
                <x-custom-input
                type="password" 
                name="new_password" 
                id="new_password" 
                placeholder="New Password" 
                ariaLabel="Introduce your new password"
                required
                />
                <x-alert-message >
                    @error("new_password")
                    {{$message}}
                    @enderror
                </x-alert-message>
            </div>
            
            
            <div> 
                <x-custom-input
                type="password" 
                name="repeat_new_password" 
                id="repeat_new_password" 
                placeholder="Repeat new password" 
                ariaLabel="Introduce your email"
                required
                />
                <x-alert-message >
                    @error("repeat_new_password")
                    {{$message}}
                    @enderror
                </x-alert-message>
            </div>
            
            @component('components.register-button', [
                'type' => 'submit',
                ])
            Update password
            @endcomponent
        </form>
        
        @endif
    </div>
    
    
    @script
    
    <script>
        
        
        $wire.on('updatedPassword', ()=>{
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Password updated successfully!",
                text: "You will now be redirected to the main page.",
                showConfirmButton: false,
        timer: 4000
    });
        setTimeout(() => {
            window.location.href= "/"
        }, 3000);
    });
    
    $wire.on('error', () => {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Oops",
            text: "Something went wrong, please try obtaining a new access link.",
            showConfirmButton: false,
        }); 
        setTimeout(() => {
            window.location.href= "/forgot-password"
        }, 4000);
        
    });
    
</script>

@endscript
