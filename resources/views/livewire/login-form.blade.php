<form wire:submit.prevent="login" novalidate class="flex flex-col gap-2 m-4">
                 
    <div>
        <x-custom-input 
        type="text" 
        name="loginInput" 
        id="loginInput" 
        placeholder="Phone number, username, or email" 
        ariaLabel="Register your username"
        required
        />
        <x-alert-message >
            @if($errorMessage)
        
            {{ $errorMessage }}
        @endif
        </x-alert-message>
    </div>
    <div>
        <x-custom-input 
        type="password" 
        name="password" 
        id="password" 
        placeholder="Password" 
        ariaLabel="Introduce your password"
        required
        />

    </div>
    <div class="flex items-center gap-1">
       
        

        <div class="inline-flex items-center">
            <label class="relative flex items-center rounded-full cursor-pointer" htmlFor="check">
              <input type="checkbox"
              wire:model="remember"
                class=" peer relative h-3 w-3 cursor-pointer appearance-none border 
                border-zinc-300 transition-all 
                checked:border-blue-400 checked:bg-blue-400 "
                id="check" />
              <span
                class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-2.5 w-2.5" viewBox="0 0 20 20" fill="currentColor"
                  stroke="currentColor" stroke-width="1">
                  <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"></path>
                </svg>
              </span>
            </label>
        </div> 
        <label class="text-xs text-slate-500" for="check">Remember me</label>

    </div>
    <x-register-button type='submit'>Log in</x-register-button>
</form>
