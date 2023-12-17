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
    <x-register-button type='submit'>Log in</x-register-button>
</form>
