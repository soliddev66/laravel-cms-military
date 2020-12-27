<x-guest-layout>
    <x-slot name="img_url">
        {{ asset('assets/frontend/img/forget-password.png') }}
    </x-slot>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class="mb-2 text-sm login-font">
                {{ __('Forget password') }} 
            </div>
            <div class="d-flex justify-content-center text-lg text-gray-0" style="font-weight: bold">
                {{ __('For recover your password') }}
            </div>
        </x-slot>

        

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label value="{{ __('Email Address') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center mt-5">
                <button type="submit" class="submit-btn">
                    {{ __('Submit') }}
                </button>
            </div>
        </form>

        <div class="mt-6 d-flex justify-content-center">
            <span class="text-sm text-gray-600">{{ __('Don\'t Have an account?') }}</span>
            <a href="{{ route('register') }}" class="mr-2 text-sm text-primary forget-pwd-font">{{ __('Register') }}</a>
        </div>

    </x-jet-authentication-card>
</x-guest-layout>
