<div>
    <h1 class="text-4xl font-semibold text-zinc-700 text-center">Settings</h1>
    <!-- Form for updating contact information -->
    <form wire:submit.prevent="updateUser" novalidate class="flex justify-center items-center gap-10 m-4">
        <div class="border p-6 max-w-md w-96 gap-2 flex flex-col">
            <h2 class="text-xl font-semibold text-center text-zinc-700">Contact Information</h2>
            
            <div>
                <label for="email" class="text-sm font-semibold text-slate-700">Email:</label>
                <!-- Input for email -->
                <x-custom-input type="text" name="email" id="email" placeholder="Email" ariaLabel="Email" />
                @error('email')
                    <x-alert-message>{{$message}}</x-alert-message>
                @enderror
            </div>
            
            <div>
                <label for="phone" class="text-sm font-semibold text-slate-700">Phone Number:</label>
                <!-- Input for phone number -->
                <x-custom-input type="text" name="phone" id="phone" placeholder="Phone number" ariaLabel="Phone number" />
                @error('phone')
                    <x-alert-message>{{$message}}</x-alert-message>
                @enderror
            </div>
            
            <!-- Update button -->
            <x-register-button type='submit'>Update</x-register-button>
            <!--Success mesage-->
           
        </div>
    </form>

    <!-- Form for changing the password -->
    <form wire:submit.prevent="updatePassword" novalidate class="flex justify-center items-center gap-10 m-4">
        <div class="border p-6 max-w-md w-96 gap-2 flex flex-col">
            <h2 class="text-xl font-semibold text-center text-zinc-700">Change Password</h2>
            
            <div>
                <label for="password" class="text-sm font-semibold text-slate-700">Current Password:</label>
                <!-- Input for current password -->
                <x-custom-input type="password" name="password" id="password" placeholder="Current Password" ariaLabel="Current Password" />
                @error('password')
                    <x-alert-message>{{$message}}</x-alert-message>
                @enderror
            </div>
            
            <div>
                <label for="new_password" class="text-sm font-semibold text-slate-700">New Password:</label>
                <!-- Input for new password -->
                <x-custom-input type="password" name="new_password" id="new_password" placeholder="New Password" ariaLabel="New Password" />
                @error('new_password')
                    <x-alert-message>{{$message}}</x-alert-message>
                @enderror
            </div>
            
            <div>
                <label for="new_password_repeat" class="text-sm font-semibold text-slate-700">Repeat New Password:</label>
                <!-- Input for repeating new password -->
                <x-custom-input type="password" name="new_password_repeat" id="new_password_repeat" placeholder="Repeat New Password" ariaLabel="Repeat New Password" />
                @error('new_password_repeat')
                    <x-alert-message>{{$message}}</x-alert-message>
                @enderror
            </div>
            
            <!-- Update password button -->
            <x-register-button type='submit'>Update Password</x-register-button>
                <!--Success mesage-->
            
        </div>
    </form>
</div>

@script

<script>
    $wire.on('updatedProfile', ()=>{
        Swal.fire({
        position: "center",
        icon: "success",
        title: "User data updated successfully!",
        showConfirmButton: false,
        timer: 3000
});
    });

    $wire.on('updatedPassword', ()=>{
        Swal.fire({
        position: "center",
        icon: "success",
        title: "Password updated successfully!",
        showConfirmButton: false,
        timer: 3000
});
    });
</script>
    
@endscript
