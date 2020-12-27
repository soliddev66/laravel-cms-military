<x-guest-layout>
    <x-slot name="img_url">
        {{ asset('assets/frontend/img/register.png') }}
    </x-slot>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class="mb-2 text-sm login-font">
                {{ __('Register') }} 
            </div>
            <div class="d-flex justify-content-center text-lg text-gray-0" style="font-weight: bold">
                {{ __('Create an account') }}
            </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('UserName') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Confirm Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="flex items-center mt-5">
                <button type="submit" class="submit-btn">
                    {{ __('Submit') }}
                </button>
            </div>
        </form>

        <div class="mt-6 d-flex justify-content-center">
            <span class="text-sm text-gray-600">{{ __('Have an account?') }}</span>
            <a href="{{ route('login') }}" class="mr-2 text-sm text-primary forget-pwd-font">{{ __('Login') }}</a>
        </div>

    </x-jet-authentication-card>
</x-guest-layout>
