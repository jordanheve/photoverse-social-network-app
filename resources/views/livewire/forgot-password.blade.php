<div class="border px-9 py-10 max-w-sm flex flex-col gap-4 justify-center items-center mx-auto" >
    <h2 class="font-semibold text-xl">Password Reset</h2>
    <form wire:submit.prevent="store" novalidate class="flex flex-col gap-2 w-full">
        <div>
            <label for="email" class="text-xs text-center my-6 text-zinc-800">
                <p >
                    Please enter your email address below. We'll send you a link to reset your password:
                </p>
            </label>
         </div>
        <div> 
            <x-custom-input
            type="email" 
            name="email" 
            id="email" 
            placeholder="Email" 
            ariaLabel="Introduce your email"
            required
            />
            <x-alert-message >
                @error("email")
                {{$message}}
                @enderror
            </x-alert-message>
        </div>
        
    
        @component('components.register-button', [
       'type' => 'submit',
       ])
        Send
       @endcomponent
    </form>

</div>