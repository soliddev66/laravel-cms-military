<x-guest-layout>
    <x-slot name="img_url">
        {{ asset('assets/frontend/img/login.png') }}
    </x-slot>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class="login-font">
                {{ __('Login') }}
            </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Username') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4 d-flex justify-content-between">
                <label>
                    <input type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Keep me logged in') }}</span>
                </label>
                <a href="{{ route('password.request') }}" class="mr-2 text-sm text-primary forget-pwd-font">{{ __('Forget Password?') }}</a>
            </div>

            <div class="flex items-center mt-4">
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
