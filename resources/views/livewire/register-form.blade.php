<form wire:submit.prevent="submit" novalidate class="flex flex-col gap-2 w-full">
    @csrf
   
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
    
   <div>
       <x-custom-input 
       type="text" 
       name="phone" 
       id="phone" 
       placeholder="Phone Number" 
       ariaLabel="Introduce your phone number"
       required
       />
       <x-alert-message >
        @error("phone")
        {{$message}}
        @enderror
    </x-alert-message>
    </div>
       <div>

           <x-custom-input 
           type="text" 
           name="name" 
           id="name" 
           placeholder="Full Name" 
           ariaLabel="Introduce your full name"
           required        
           />
           <x-alert-message >
            @error("name")
            {{$message}}
            @enderror
        </x-alert-message>
        </div>

        <div>
            <x-custom-input 
            type="text" 
            name="username" 
            id="username" 
            placeholder="Username" 
            ariaLabel="Register your username"
            required
            />
            <x-alert-message >
                @error("username")
                {{$message}}
                @enderror
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
            <x-alert-message >
                @error("password")
                {{$message}}
                @enderror
            </x-alert-message>
        </div>

        <div>
            <x-custom-input 
            type="password" 
            name="password_confirmation" 
            id="password_confirmation" 
            placeholder="Repeat Your Password" 
            ariaLabel="Repeat your password"
            required
            />
            <x-alert-message >
                @error("password_confirmation")
                {{$message}}
                @enderror
            </x-alert-message>
        </div>
   
    <div>
       <p class="text-xs text-center my-6">
           By signing up, you agree to our Terms , Privacy Policy and Cookies Policy .
       </p>
    </div>

    @component('components.register-button', [
   'type' => 'submit',
   ])
    Sign Up
   @endcomponent
</form>