<x-guest-layout>
    <x-slot name="img_url">
        {{ asset('assets/frontend/img/change-password.png') }}
    </x-slot>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class="login-font">
                {{ __('Change Password') }}
            </div>
            <div class="d-flex justify-content-center text-lg text-gray-0" style="font-weight: bold">
                {{ __('You can change your password here') }}
            </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('change.password') }}">
            @csrf
            <div class="block">
                <x-jet-label value="{{ __('Old Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="current_password" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('New Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Confirm New Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required  />
            </div>

            <div class="flex items-center mt-4">
                <button type="submit" class="submit-btn">
                    {{ __('Submit') }}
                </button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
