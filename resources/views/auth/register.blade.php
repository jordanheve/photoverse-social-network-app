@extends('app')

@section('content')
<div class="flex flex-col items-center">
    
    <!--register form-->
    <div>
        <div class="border px-6 py-10 w-80 flex flex-col gap-4 justify-center items-center">
            <h1 class="text-4xl font-extralight italic">Photoverse</h1>
            <p class="text-slate-500 font-semibold text-center">Sign up to see photos from your friends</p>
            <form action="" class="flex flex-col gap-2 w-full">
                 @component('components.custom-input', [
                    'type' => 'email',
                    'name' => 'email',
                    'id' => 'email',
                    'placeholder' => 'Email',
                    'attributes' => 'required',
                    'ariaLabel' => 'Introduce your email',
                 ])
                 @endcomponent
                
                 @component('components.custom-input', [
                    'type' => 'text',
                    'name' => 'phone',
                    'id' => 'Phone',
                    'placeholder' => 'Phone Number',
                    'attributes' => 'required',
                    'ariaLabel' => 'Introduce your phone number',
                 ])
                 @endcomponent
                 @component('components.custom-input', [
                    'type' => 'text',
                    'name' => 'name',
                    'id' => 'name',
                    'placeholder' => 'Full Name',
                    'attributes' => 'required',
                    'ariaLabel' => 'Introduce your full name',
                 ])
                 @endcomponent
                 @component('components.custom-input', [
                    'type' => 'text',
                    'name' => 'username',
                    'id' => 'username',
                    'placeholder' => 'Username',
                    'attributes' => 'required',
                    'ariaLabel' => 'Register your username',
                 ])
                 @endcomponent
                 @component('components.custom-input', [
                    'type' => 'password',
                    'name' => 'password',
                    'id' => 'password',
                    'placeholder' => 'Password',
                    'attributes' => 'required',
                    'ariaLabel' => 'Introduce your password',
                 ])
                 @endcomponent
                
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
        </div>
        <div class="border p-6 w-80 mt-3 text-center gap-4 justify-center items-center">
            <p class="text-sm">Have an account? <a href="" class="text-sky-500 font-semibold">Log in</a></p>
        </div>
        
    </div>
</div>



@endsection